import { Component, DoCheck, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { GLOBAL } from '../../../services/global';
import { UserService } from '../../../services/user.service';
import { UploadService } from '../../../services/upload.service';
import { User } from '../../../models/user';

import { fadeLateral } from '../../animation';

@Component({
  selector: 'app-list-keeper',
  templateUrl: './list-keeper.component.html',
  styleUrls: ['./list-keeper.component.css'],
  providers: [ UserService],
  animations: [fadeLateral]
})
export class ListKeeperComponent implements OnInit{
  	public title: string;
  	public numbers = new Array(10);
  	public keepers: User[];
    public user : User;
    public token;
    public busqueda;

  	constructor(
  		private _route: ActivatedRoute,
  		private _router: Router,
      private _userService: UserService
  	){
  		this.title = 'Listado de Cuidadores';
      this.token = this._userService.getToken();
  	}

    ngOnInit(){
  		console.log('keepers.component cargado !!');
  		this.getKeepers();
  	}

  	getKeepers(){
        this._userService.getKeepers().subscribe(
          response => {
            if(!response.users){

            }else{

              this.keepers = response.users;
            }
          },
          error => {
            console.log(<any>error);
          }
        );
      }

    deleteUsers(id){
      $('#myModal-'+id).modal('hide');
      this._userService.deleteUser(this.token, id).subscribe(
        response => {
          if(!response.animal){
            alert('Error en el servidor');
          }
          this.getKeepers();
        },
        error => {
          alert('Error en el servidor');
        }
      );
    }
  }
