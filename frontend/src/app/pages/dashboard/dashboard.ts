import { Post } from '../../components/post/post';
import { Component, signal } from '@angular/core';
import { PostService } from './../../services/post.service';
import { CommonModule } from '@angular/common';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-dashboard',
  imports: [Post, CommonModule, RouterLink],
  templateUrl: './dashboard.html',
  styleUrl: './dashboard.scss',
})
export class Dashboard {

  posts = signal<any[]>([]);

  constructor(private PostService: PostService) { }

  ngOnInit(): void {
    this.PostService.getPosts().subscribe({
      next: (data) => {
        this.posts.set(data);
      },
      error: (error) => {
        console.error('error:', error);
      }
    });
  }

  forceDeletePost(id: number) {
    this.posts.update(posts => posts.filter(post => post.id !== id));
  }

  deletePost(id: number) {
    this.posts.update(posts => posts.map(post => post.id === id ? { ...post, deleted_at: new Date().toISOString() } : post));
  }

  restorePost(id: number) {
    this.posts.update(posts => posts.map(post => post.id === id ? { ...post, deleted_at: null } : post));
  }

}
