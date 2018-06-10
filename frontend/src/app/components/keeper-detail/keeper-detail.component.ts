import { Component, DoCheck, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';

import { GLOBAL } from '../../services/global';
import { UserService } from '../../services/user.service';
import { User } from '../../models/user';

@Component({
  selector: 'app-keeper-detail',
  templateUrl: './keeper-detail.component.html',
  styleUrls: ['./keeper-detail.component.css'],
  providers: [UserService]
})
export class KeeperDetailComponent implements OnInit {
  public user: User;
  public url: string;

  constructor(
    private _route: ActivatedRoute,
    private _router: Router,
    private _userService: UserService
  ) {
    this.url = GLOBAL.url;
  }

  ngOnInit() {
    console.log('keeper-detail component cargado...');
    this.getUser();
    console.log(this.getUser());
  }

  getUser() {
    this._route.params.forEach((params: Params) => {
      let id: any;
      id = params['id'];

      this._userService.getkeeperUser(id).subscribe(
        response => {
          if (!response.user) {
            this._router.navigate(['/admin-panel']);
            console.log('entra AQUI');
          } else {
            this.user = response.user;
            console.log('entra BIEN');
          }
        },
        error => {
          console.log(<any>error);
          this._router.navigate(['/admin-panel']);
          console.log('entra AQUI');
        }
      );
    });
  }
}
