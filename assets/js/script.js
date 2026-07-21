const gambar = [
    "assets/images/bg1.webp",
    "assets/images/bg2.jpg",
    "assets/images/bg3.jpg",
    "assets/images/bg4.webp"
];

let nomor = 0;

setInterval(function(){

    nomor++;

    if(nomor >= gambar.length){
        nomor = 0;
    }

    document.getElementById("banner").style.backgroundImage =
    "url('"+gambar[nomor]+"')";

},5000);