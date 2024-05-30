
//chatbox
const chatIcon = document.querySelector('#chat-icon');
const chatBox = document.querySelector('#chat-box');
const chatForm =document.querySelector('.user-chat');
const chatInput = chatForm.querySelector("input[type='text']");
const chatButton = chatForm.querySelector("button");
const chatBody =document.querySelector('#chat-body');


chatIcon.addEventListener('click', function() {
  if (chatBox.style.display=='block') {
    chatBox.style.display='none';
    
  } else {
    chatBox.style.display='block';
  }
});
chatButton.addEventListener('click', function(event) {
    event.preventDefault();
    const message = chatInput.value.trim();
    if (message) {
        const chatElement = document.createElement('div');
        chatElement.classList.add('user-text');
        chatElement.innerHTML = `
            <img src="../img/man.png" alt="">
            <p>${message}</p>
        `;
        chatBody.appendChild(chatElement);
        chatInput.value = '';
    }
});




//end chat box

