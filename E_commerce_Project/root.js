let branchs = document.querySelectorAll(".reviewCard");   //carousel function
let card = document.querySelectorAll(".card");            //Selects all elements with the class .card.
let crossBtn = document.getElementById("cross");


let icon = document.getElementById("icon");      //Grabs the moon/sun icon that toggles dark mode.
let count = 0;

branchs.forEach(function(card, index){
    card.style.left=`${index*100}%`       //Positions each .reviewCard horizontally side by side. First card gets left: 0%, second left: 100%
})

function myFun(){
    branchs.forEach(function(crd){
        crd.style.transform=`translateX(-${count * 100}%)`    //Shifts all the cards to the left by count * 100%, creating a sliding effect.
    })
}

setInterval(function(){
    count++;
    if(count == branchs.length){          //Automatically moves to the next card every 2 seconds.
        count=0;                          //Loops back to the first card when reaching the end.
    }
    myFun();
},2000)


// darkmode
icon.addEventListener("click", function(){
    document.querySelector("body").classList.toggle("toggle");
    if(icon.className == "fa-solid fa-moon"){
        icon.className="fa-solid fa-sun"
        icon.style.color="white"
    }else{
        icon.className="fa-solid fa-moon"
        icon.style.color="black"

    }
    
})

// speciality
card.forEach(function(curCard){
    curCard.addEventListener("click", function(){
        console.log(curCard);

        let div = document.createElement("div");
        div.classList.add("detailCard");
        div.innerHTML=`
        <i  id="cross" onclick="clicked()" class="fa-solid fa-xmark"></i>
        <img src=${curCard.firstElementChild.src} alt="">
        <h2>${curCard.lastElementChild.innerHTML}</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores culpa, ullam tempora dignissimos, quibusdam ab voluptatibus excepturi sint, nam reprehenderit tenetur neque placeat architecto. Sit?</p>

        `
        document.querySelector("body").appendChild(div)    //Adds the detailCard to the body, making it visible.
    })
})

function clicked(){
document.querySelector(".detailCard").remove();
}
 