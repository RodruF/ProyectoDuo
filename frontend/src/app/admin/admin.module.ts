// Modulos
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from  '@angular/forms';
import { HttpModule } from '@angular/http';
import { AdminRoutingModule } from './admin-routing.module';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

// Componentes
import { MainComponent } from './components/main/main.component';
import { ListComponent } from './components/list/list.component';
import { AddComponent } from './components/add/add.component';
import { EditComponent } from './components/edit/edit.component';
import { AddKeeperComponent } from './components/add-keeper/add-keeper.component';
import { ListKeeperComponent } from './components/list-keeper/list-keeper.component';
import { EditKeeperComponent } from './components/edit-keeper/edit-keeper.component';

// Servicios
import {UserService} from '../services/user.service';
import {AdminGuard} from '../services/admin.guard';
import {SearchPipe} from './pipes/search.pipe';




@NgModule({
	declarations: [
		MainComponent,
		ListComponent,
		AddComponent,
		EditComponent,
		SearchPipe,
		AddKeeperComponent,
		ListKeeperComponent,
		EditKeeperComponent
	],
	imports: [
		CommonModule,
		FormsModule,
		HttpModule,
		AdminRoutingModule,
		BrowserAnimationsModule
	],
	exports: [
		MainComponent,
		ListComponent,
		AddComponent,
		EditComponent,
		AddKeeperComponent,
		ListKeeperComponent,
		EditKeeperComponent

	],
	providers: [
		UserService,
		AdminGuard
	]
})
export class AdminModule { }
