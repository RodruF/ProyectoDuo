import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";

// Componentes
import { MainComponent } from "./components/main/main.component";
import { ListComponent } from "./components/list/list.component";
import { AddComponent } from "./components/add/add.component";
import { EditComponent } from "./components/edit/edit.component";
import { AddKeeperComponent } from "./components/add-keeper/add-keeper.component";
import { ListKeeperComponent } from "./components/list-keeper/list-keeper.component";
import { EditKeeperComponent } from "./components/edit-keeper/edit-keeper.component";

import { AdminGuard } from "../services/admin.guard";

const adminRoutes: Routes = [
  {
    path: "admin-panel",
    component: MainComponent,
    canActivate: [AdminGuard],
    children: [
      { path: "", redirectTo: "listado", pathMatch: "full" },
      { path: "listado", component: ListComponent },
      { path: "crear", component: AddComponent },
      { path: "editar/:id", component: EditComponent },
      { path: "listado-cuidador", component: ListKeeperComponent },
      { path: "añadir-cuidador", component: AddKeeperComponent },
      { path: "editar-cuidador/:id", component: EditKeeperComponent }
    ]
  },
  { path: "listado-del-panel", component: ListComponent }
];

@NgModule({
  imports: [RouterModule.forChild(adminRoutes)],
  exports: [RouterModule]
})
export class AdminRoutingModule {}
