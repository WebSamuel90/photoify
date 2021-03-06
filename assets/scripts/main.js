'use strict';

const editButton = [...document.querySelectorAll('.fa-edit')]
const deleteButton = [...document.querySelectorAll('.fa-trash-alt')]
const likeButton = document.querySelectorAll('.fa-heart')

function confirmDelete() {
  let del = confirm("Are you sure?")

  if(del === true) {
    window.location.href="../../app/posts/delete.php"
  } else {
    window.location.href="../../profile.php"
  }
}

//Select post_id to edit
editButton.forEach(button => {
  button.addEventListener('click', (event) => {
    document.cookie = "postId=" + event.target.dataset.id
  })
})

//Select post_id to delete
deleteButton.forEach(button => {
  button.addEventListener('click', (event) => {
    document.cookie = "postId=" + event.target.dataset.id
    confirmDelete()
  })
})
