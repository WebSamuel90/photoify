'use strict';

console.log('Hello World');

const editButton = [...document.querySelectorAll('.fa-edit')]
const deleteButton = [...document.querySelectorAll('.fa-trash-alt')]

function confirmDelete() {
  let del = confirm("Are you sure?")

  if(del === true) {
    window.location.href="../../app/posts/delete.php"
  } else {
    window.location.href="../../profile.php"
  }
}

editButton.forEach(button => {
  button.addEventListener('click', (event) => {
    document.cookie = "postId=" + event.target.dataset.id
  })
})

deleteButton.forEach(button => {
  button.addEventListener('click', (event) => {
    document.cookie = "postId=" + event.target.dataset.id
    confirmDelete()

  })
})
