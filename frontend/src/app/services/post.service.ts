import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class PostService {

  private apiUrl = 'http://127.0.0.1:8000/api/posts';

  constructor(private http: HttpClient) {

  }

  getPosts() {
    return this.http.get<any[]>(this.apiUrl);
  }

  deletePost(id: number) {
    return this.http.delete(`${this.apiUrl}/${id}/delete`);
  }

  forceDeletePost(id: number) {
    return this.http.delete(`${this.apiUrl}/${id}/force_delete`);
  }

  restorePost(id: number) {
    return this.http.get(`${this.apiUrl}/${id}/restore`);
  }

  addPost(data: any) {
    return this.http.post(`${this.apiUrl}/add`, data);
  }

  editPost(data: any, id: number) {
    return this.http.post(`${this.apiUrl}/${id}/edit`, data);
  }

}
