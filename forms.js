var forms = document.querySelector('#prod-form');
var forms = document.querySelector('#supplier-form');
var forms = document.querySelector('#cat-form');
var forms = document.querySelector('#order-form');
var addBtn = document.querySelector('#addBtn');

console.log('Hello');

addBtn.addEventListener('click', function(){
    console.log('Hi');
    console.log(forms.style.display == 'none');
    // if(forms.style.display == 'none'){
        forms.style.display = 'flex';
    // }
})

var closeBtn = document.querySelector('#close');

closeBtn.addEventListener('click', function(){
    // if(forms.style.display == 'flex'){
        forms.style.display = 'none';
    // }
})