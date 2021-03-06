import { User } from './../models/user';
import { Injectable } from '@angular/core';
import { Http, Response, Headers, RequestOptions } from '@angular/http';
// import 'rxjs/add/operator/map';
// import { Observable } from 'rxjs/Observable';
import 'rxjs/Rx';
import {Observable} from 'rxjs/Rx';
import { GLOBAL } from './global';

@Injectable()
export class UserService {
  public url: string;
  public identity;
  public token;

  constructor(private _http: Http) {
    this.url = GLOBAL.url;
  }

  register(user_to_register) {
    let params: any;
    params = JSON.stringify(user_to_register);
    let headers: any;
    headers = new Headers({ 'Content-Type': 'application/json' });

    return this._http
      .post(this.url + 'register', params, { headers: headers })
      .map(res => res.json());
  }

  registerKeeper(user_to_register) {
    let params: any;
    params = JSON.stringify(user_to_register);
    let headers: any;
    headers = new Headers({ 'Content-Type': 'application/json' });

    return this._http
      .post(this.url + 'addkeepers', params, { headers: headers })
      .map(res => res.json());
  }

  signup(user_to_login, gettoken = null) {
    if (gettoken != null) {
      user_to_login.gettoken = gettoken;
    }

    let params: any;
    params = JSON.stringify(user_to_login);
    let headers: any ;
    headers = new Headers({ 'Content-Type': 'application/json' });

    return this._http
      .post(this.url + 'login', params, { headers: headers })
      .map(res => res.json());
  }

  getIdentity() {
    let identity: any;
    identity = JSON.parse(localStorage.getItem('identity'));

    if (identity !== 'undefined') {
      this.identity = identity;
    } else {
      this.identity = null;
    }

    return this.identity;
  }

  getToken() {
    let token: any;
    token = localStorage.getItem('token');

    if (token !== 'undefined') {
      this.token = token;
    } else {
      this.token = null;
    }

    return this.token;
  }

  getkeeperUser(id) {
    return this._http
      .get(this.url + 'keepers-edit/' + id)
      .map(res => res.json());
  }

  updateUser(user_to_update) {
    let params: any;
    params = JSON.stringify(user_to_update);
    let headers: any ;
    headers = new Headers({
      'Content-Type': 'application/json',
      Authorization: this.getToken()
    });

    return this._http
      .put(this.url + 'update-user/' + user_to_update._id, params, {
        headers: headers
      })
      .map(res => res.json());
  }

  editkeeper(token, id, user) {
    let params: any;
    params = JSON.stringify(user);
    let headers: any;
    headers = new Headers({
      'Content-Type': 'application/json',
      Authorization: token
    });

    return this._http
      .put(this.url + 'update-user/' + id, params, { headers: headers })
      .map(res => res.json());
  }

  getKeepers() {
    return this._http.get(this.url + 'cuidadors').map((response: Response) => response.json());
  }

  deleteUser(token, id) {
    let headers: any ;
    headers = new Headers({
      'Content-Type': 'application/json',
      Authorization: token
    });

    let options: any;
    options = new RequestOptions({ headers: headers });
    return this._http
      .delete(this.url + 'keepers-delete/' + id, options)
      .map(res => res.json());
  }
}
