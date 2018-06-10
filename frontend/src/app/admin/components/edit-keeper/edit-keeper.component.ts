import { Component, OnInit, DoCheck } from '@angular/core';
import { Router, ActivatedRoute, Params }  from '@angular/router';
import { User } from '../../../models/user';
import { GLOBAL } from '../../../services/global';
import { UserService } from '../../../services/user.service';
import { UploadService } from '../../../services/upload.service';

@Component({
  selector: "app-edit-keeper",
  templateUrl: '../add-keeper/add-keeper.component.html',

  providers: [UserService, UploadService]
})
export class EditKeeperComponent implements OnInit {
  public title: string;
  public user: User;
  public identity;
  public token;
  public status;
  public url: string;
  public is_edit;

  constructor(
    private _route: ActivatedRoute,
    private _userService: UserService,
    private _uploadService: UploadService,
    private _router: Router

  ) {
    this.is_edit = true;
    this.title = "Actualizar Cuidador";
    this.identity = this._userService.getIdentity();
    this.token = this._userService.getToken();
     this.user = new User("", "", "", "","", "ROLE_ADMIN", "");
    this.url = GLOBAL.url;
  }

  ngOnInit() {
    console.log("user-edit.component.ts cargado !!");
    this.getKeepers();
  }
 	getKeepers(){
     this._route.params.forEach((params : Params)=>{
      let id = params["id"];
        this._userService.getkeeperUser(id).subscribe(
          response => {
            if(!response.user){
              this._router.navigate(["/home"]);
            }else{
              this.user = response.user;
            }
          },
          error => {
            console.log(<any>error);
          }
        );
      });
      }

  onSubmit() {
    var id = this.user._id;
    this._userService.editkeeper(this.token, id, this.user).subscribe(
      response => {
        if (!response.user) {
          this.status = "error";
        } else {
          this.status = "success";
          this.user = response.user;

          // Subida de la imagen
          this._uploadService.makeFileRequest(this.url + "upload-image-user/" + this.user._id, [], this.filesToUpload,this.token,"image")
            .then((result: any) => {
              this.user.image = result.image;
              localStorage.setItem("identity", JSON.stringify(this.user));
            });
        }
      },
      error => {
        var errorMessage = <any>error;
        if (errorMessage != null) {
          this.status = "error";
        }
      }
    );
  }

  public filesToUpload: Array<File>;
  fileChangeEvent(fileInput: any) {
    this.filesToUpload = <Array<File>>fileInput.target.files;
  }
}
