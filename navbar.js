var lines = document.querySelector('#lines');
var mob = document.querySelector('#mob-links');

lines.addEventListener('click', function(){
    console.log("Hello");
    if(mob.style.display == "flex"){
        mob.style.display = 'none';
    }
    else {
        mob.style.display = 'flex';
    }
})