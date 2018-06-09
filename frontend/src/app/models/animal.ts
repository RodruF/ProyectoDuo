import { User } from './user';
export class Animal {
  constructor(
    public id: string,
    public nombre: string,
    public description: string,
    public especie: string,
    public año: number,
    public image: string,
    public user: User
  ) {}
}
