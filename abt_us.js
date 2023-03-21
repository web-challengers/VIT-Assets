var cards = document.querySelectorAll('.card');
var cardlowers = document.querySelectorAll('.card-lower');

console.log(cards);
for (let index = 0; index < cards.length; index++) {
    const element = cards[index];
    const datacard = cardlowers[index];
    console.log(element);
    element.addEventListener('mouseover', function(){
        // console.log("Hello");
        datacard.style.display = 'flex';
    })

    element.addEventListener('mouseout', function(){
        // console.log("Hello");
        datacard.style.display = 'none';
    })
    
}
