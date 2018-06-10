
import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params }  from '@angular/router';
import { User } from '../../../models/user';
import { GLOBAL } from '../../../services/global';
import { UserService } from '../../../services/user.service';
import { fadeLateral } from '../../animation';
import { UploadService } from "../../../services/upload.service";

@Component({
  selector: "app-add-keeper",
  templateUrl: "./add-keeper.component.html",
  styleUrls: ["./add-keeper.component.css"],
  animations: [fadeLateral],
  providers: [UserService, UploadService]
})
export class AddKeeperComponent implements OnInit {
  public title: String;
  public user: User;
  public status: string;
  public url: string;
  public token;

  constructor(
    private _route: ActivatedRoute,
    private _router: Router,
    private _userService: UserService,
    private _uploadService: UploadService
  ) {
    this.title = "Registro de Cuidadores";
    this.user = new User("", "", "", "", null, "ROLE_ADMIN", "");
    this.url = GLOBAL.url;
     this.token = this._userService.getToken();
  }

  ngOnInit() {
    console.log("register.component cargado !!");
  }

  onSubmit(registerForm) {
    this._userService.register(this.user).subscribe(
      response => {
        if (response.user && response.user._id) {
          this.status = "success";

          this.user = new User("", "", "", "", null, "ROLE_ADMIN", "");
          registerForm.reset();
        } else {
          this.status = "error";

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
