let img;

let label = "waiting...";
let second=0;
// The classifier
let classifier;
let modelURL = 'https://teachablemachine.withgoogle.com/models/wO99AJmB/';
var posiX=0;
var posiY=0;
var posiX2=0;
var posiYd=false;
var red2=0;
var rose=0;
var white=0;
var yellow=0;
var purple=0;
var blue2=0;

var images = [];

function preload() {
 
 classifier = ml5.imageClassifier(modelURL + 'model.json');
}

function setup() {
  var canvas=createCanvas(1200, 800);
  input = createFileInput(handleFile);
  input.position(width-220, 300);
 // noLoop();
}

function draw() {
  background(255);

  if(images.length>0){
    console.log(posiX)
    

      for ( var z = 0; z < images.length; z++) {
        if(posiX<900){
          image(images[z], posiX, posiY, 100, 100 );
          posiX=posiX+100;
        }else{
          image(images[z], posiX2, posiY+100, 100, 100 );
          posiX2=posiX2+100;
        }
      }
  }
  posiX=0;
  posiX2=0;
 // console.log(images.length);
 
  textAlign(CENTER, CENTER);
  fill(255,0,0);
  textSize(20);
  text("Frequency of Shirts :\n", width-120, 100);
 
  text("( Red ) :\n", width-120, 150);
  textSize(60);
  text(red2+"/"+images.length, width-120, 180);

  textSize(20);
  text("( Rose ) :\n", width-120, 250);
  textSize(60);
  text(rose+"/"+images.length, width-120, 280);

  textSize(20);
  text("( White ) :\n", width-120, 350);
  textSize(60);
  text(white+"/"+images.length, width-120, 380);

  textSize(20);
  text("( Yellow ) :\n", width-120, 450);
  textSize(60);
  text(yellow+"/"+images.length, width-120, 480);

  textSize(20);
  text("( Purple ) :\n", width-120, 550);
  textSize(60);
  text(purple+"/"+images.length, width-120, 580);

  textSize(20);
  text("( Blue ) :\n", width-120, 650);
  textSize(60);
  text(blue2+"/"+images.length, width-120, 680);
 
}

function classifyImage() {
  classifier.classify(img, gotResults);
}

function handleFile(file) {
  print(file);
  if (file.type === 'image') {
    img = createImg(file.data, '');
    images.push(img);
    img.hide();
    classifyImage()
    posiX=posiX+200;
  } else {
    img = null;
  }
}

function gotResults(error, results) {
  // Something went wrong!
  if (error) {
    console.error(error);
    return;
  }
  // Store the label and classify again!
  second=results[0].label;
   if(second=="Blue"){
    blue2++;
   // console.log(rightCount);
   }
   if(second=="Purple"){
    purple++;
   // console.log(rightCount);
   }
   if(second=="Red"){
    red2++;
   // console.log(rightCount);
   }
   if(second=="Rose"){
    rose++;
   // console.log(rightCount);
   }
   if(second=="White"){
    white++;
   // console.log(rightCount);
   }
   if(second=="Yellow"){
    yellow++;
   // console.log(rightCount);
   }
   console.log(red);

  if (img) {
    console.log(results[0].label);
  }

  
  print(results)

}