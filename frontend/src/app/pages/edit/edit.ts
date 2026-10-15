import { Post } from './../../components/post/post';
import { Router, RouterLink } from '@angular/router';
import { Location } from '@angular/common';
import { PostService } from './../../services/post.service';
import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-edit',
  imports: [FormsModule],
  templateUrl: './edit.html',
  styleUrl: './edit.scss',
})
export class Edit {
  @Input() post: any;
  @Output() editedPost = new EventEmitter();

  postId!: number;
  errors: any = {};
  submitted = false;
  successMsg = '';

  Data = {
    author_name: '',
    title: '',
    body: '',
  }

  constructor(private PostService: PostService, private Location: Location
  ) {

    const post = history.state.post;

    if (post) {
      this.postId = post.id;
      this.Data = {
        author_name: post.author_name,
        title: post.title,
        body: post.body
      };
    }
  }

  editPost() {
    this.errors = {};
    this.submitted = true;

    if (
      !this.Data.author_name.trim() ||
      !this.Data.title.trim() ||
      !this.Data.body.trim()
    ) {
      return;
    }

    this.PostService.editPost(this.Data, this.postId).subscribe({
      next: () => {
        this.successMsg = 'post added successfully';
        this.editedPost.emit(this.postId);
        this.Location.back();
      },
      error: (error) => {
        if (error.status === 422) {
          this.errors = error.error.errors;
        }
        console.error('error:', error);
      }
    });
  }
}
