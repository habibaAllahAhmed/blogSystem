import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { Dashboard } from './pages/dashboard/dashboard';
import { Edit } from './pages/edit/edit';
import { AddPost } from './pages/addPost/addPost';

export const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', component: Home, title: 'home' },
  { path: 'dashboard', component: Dashboard, title: 'dashboard' },
  { path: 'edit', component: Edit, title: 'edit' },
  { path: 'addPost', component: AddPost, title: 'addPost' },
  { path: ' ', component: Home, title: 'home' },
];
