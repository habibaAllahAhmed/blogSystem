import { Component, signal } from '@angular/core';
import { PostService } from './../../services/post.service';
import { CommonModule } from '@angular/common';
import { Post } from '../../components/post/post';

@Component({
  selector: 'app-home',
  imports: [Post, CommonModule],
  templateUrl: './home.html',
  styleUrl: './home.scss',
})
export class Home {

  posts = signal<any[]>([]);

  constructor(private PostService: PostService) {
  }

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



}
