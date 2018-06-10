import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// Componentes
import { TiendaComponent } from './components/tienda/tienda.component';
import { AnimalsComponent } from './components/animals/animals.component';
import { ContactComponent } from './components/contact/contact.component';
import { HomeComponent } from './components/home/home.component';
import { KeepersComponent } from './components/keepers/keepers.component';
import { RegisterComponent } from './components/register/register.component';
import { LoginComponent } from './components/login/login.component';
import { UserEditComponent } from './components/user-edit/user-edit.component';
import {KeeperDetailComponent} from './components/keeper-detail/keeper-detail.component';
import { AnimalDetailComponent } from './components/animal-detail/animal-detail.component';

const appRoutes: Routes = [
	//{path: '', component: HomeComponent},
	{path: '', redirectTo: 'login', pathMatch: 'full'},
	{path: 'home', component: HomeComponent},
	{path: 'animales', component: AnimalsComponent},
	{path: 'contacto', component: ContactComponent},
	{path: 'cuidadores', component: KeepersComponent},
	{path: 'tienda', component: TiendaComponent},
	{path: 'registro', component: RegisterComponent},
	{path: 'login', component: LoginComponent},
	{path: 'mis-datos', component: UserEditComponent},
	{path: 'animal/:id', component: AnimalDetailComponent},
	{path: 'getkeeperUser/:id', component: KeeperDetailComponent},
	{path: '**', component: HomeComponent}

];

export const appRoutingProviders: any[] = [];
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
