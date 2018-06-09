import { Component, DoCheck, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { GLOBAL } from '../../../services/global';
import { AnimalService } from '../../../services/animal.service';
import { UserService } from '../../../services/user.service';
import { UploadService } from '../../../services/upload.service';
import { Animal } from '../../../models/animal';

import { fadeLateral } from '../../animation';
import { User } from '../../../models/user';

@Component({
  selector: 'app-admin-add',
  templateUrl: './add.component.html',
  providers: [UserService, AnimalService, UploadService],
  animations: [fadeLateral]
})
export class AddComponent implements OnInit{
  	public title: string;
    public animal: Animal;
    public user: User;
  	public identity;
  	public token;
  	public url: string;
    public status;
    public filesToUpload: Array<File>;

  	constructor(
  		private _route: ActivatedRoute,
  		private _router: Router,
  		private _userService: UserService,
  		private _animalService: AnimalService,
  		private _uploadService: UploadService
  	) {
  		this.title = 'Añadir Animal';
      this.animal = new Animal('', '', '', '', 2017, '', this.user);
  		this.identity = this._userService.getIdentity();
  		this.token = this._userService.getToken();
  		this.url = GLOBAL.url;
  	}

  	ngOnInit() {
  		console.log('animal-add componente ha sido cargado !!');
  	}

  	onSubmit() {

  		this._animalService.addAnimal(this.token, this.animal).subscribe(
  			response => {
  				if (!response.animal) {
  					this.status = 'error';
  				} else {
  					this.status = 'success';
  					this.animal = response.animal;

  					// Subir imagen del animal
  					if (!this.filesToUpload) {
						this._router.navigate(['/admin-panel/listado']);
  					} else {
						// Subida de la imagen
						this._uploadService.makeFileRequest(this.url + 'upload-image-animal/' + this.animal.id, [], this.filesToUpload, this.token, 'image')
						    .then((result: any) => {
						    	this.animal.image = result.image;

						    	this._router.navigate(['/admin-panel/listado']);
						   	});
  					}

  				}
			},
			error => {
        let errorMessage: any;
        errorMessage = <any>error;

				if (errorMessage != null) {
					this.status = 'error';
				}
			}
  		);
  	}


	fileChangeEvent(fileInput: any){
		this.filesToUpload = <Array<File>>fileInput.target.files;
	}
}
