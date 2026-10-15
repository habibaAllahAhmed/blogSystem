import { FormsModule } from '@angular/forms';
import { PostService } from './../../services/post.service';
import { Component, EventEmitter, Output } from '@angular/core';
import { RouterLink } from '@angular/router';
import { Location } from '@angular/common';

@Component({
  selector: 'app-add-post',
  imports: [FormsModule, RouterLink],
  templateUrl: './addPost.html',
  styleUrl: './addPost.scss',
})
export class AddPost {

  @Output() addedPost = new EventEmitter();

  errors: any = {};
  submitted = false;

  Data = {
    author_name: '',
    title: '',
    body: '',
  }

  constructor(private PostService: PostService, private Location: Location) { }

  addPost() {

    this.errors = {};
    this.submitted = true;

    if (
      !this.Data.author_name.trim() ||
      !this.Data.title.trim() ||
      !this.Data.body.trim()
    ) {
      return;
    }

    this.PostService.addPost(this.Data).subscribe({
      next: () => {
        this.addedPost.emit();
        this.Location.back();
      },
      error: (error) => {
        this.errors = error.error.errors;
        console.error('error:', error);
      }
    });
  }
}
