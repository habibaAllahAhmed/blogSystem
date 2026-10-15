import { DatePipe } from '@angular/common';
import { PostService } from './../../services/post.service';
import { Component, EventEmitter, Input, Output } from '@angular/core';
import { RouterLink, Router } from '@angular/router';
@Component({
  selector: 'app-post',
  imports: [RouterLink, DatePipe],
  templateUrl: './post.html',
  styleUrl: './post.scss',
})
export class Post {
  @Input() post: any;
  @Input() operations: boolean = false;
  @Output() deletedPost = new EventEmitter<number>();
  @Output() forceDeletedPost = new EventEmitter<number>();
  @Output() restoredPost = new EventEmitter<number>();

  constructor(private PostService: PostService,
    private Router: Router
  ) { }

  goToEditPage() {
    this.Router.navigate(['/edit'], {
      state: { post: this.post }
    });
  }


  deletePost() {
    this.PostService.deletePost(this.post.id).subscribe({
      next: () => {
        this.deletedPost.emit(this.post.id);
      },
      error: (error) => {
        console.error('error:', error);
      }
    });
  }

  restorePost() {
    this.PostService.restorePost(this.post.id).subscribe({
      next: () => {
        this.restoredPost.emit(this.post.id);
      },
      error: (error) => {
        console.error('error:', error);
      }
    });
  }

  forceDeletePost() {
    this.PostService.forceDeletePost(this.post.id).subscribe({
      next: () => {
        this.forceDeletedPost.emit(this.post.id);
      },
      error: (error) => {
        console.error('error:', error);
      }
    });
  }

}
