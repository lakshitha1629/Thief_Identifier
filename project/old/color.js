let img;

var bar1;
var bar2;
var bar3;
var bar4;
var bar5;
var bar6;


let label = "waiting...";
let second=0;
// The classifier
let classifier;
let modelURL = 'https://teachablemachine.withgoogle.com/models/wO99AJmB/';
var posiX=0;
var posiY=0;
var posiX2=0;
var posiYd=false;
var rightCount=0

var images = [];

function preload() {
 
 classifier = ml5.imageClassifier(modelURL + 'model.json');
}

function setup() {
  createCanvas(1200, 400);
  input = createFileInput(handleFile);
  input.position(1000, 300);
 // noLoop();

 bar1 = createElement('bar1','');
 bar2 = createElement('bar2','');
 bar3 = createElement('bar3','');
 bar4 = createElement('bar4','');
 bar5 = createElement('bar5','');
 bar6 = createElement('bar6','');
}

function draw() {
  background(255);

  if (img) {
    image(img, width/2.5, 0, 400, 400);
  }
  textSize(20);
  textAlign(CENTER, CENTER);
  fill(255,0,0);
  //text("Frequency of Correct Shirts :\n", width-120, height / 10);
  textSize(80);

 // text(second, width-120, height / 6);
 
}

function classifyImage() {
  classifier.classify(img, gotResults);
}

function handleFile(file) {
  print(file);
  if (file.type === 'image') {
    img = createImg(file.data, '');
    //images.push(img);
    img.hide();
    classifyImage()
   // posiX=posiX+200;
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

  if (img) {
    console.log(results[0].label);
  }


    bar1.html("<div id=\"home\" class=\"container\">"+results[0].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[0].confidence*100+"%;height:30px\"></div><h5>"+results[0].confidence*100+"%</h5></div></div><br>");
    bar2.html("<div id=\"home\" class=\"container\">"+results[1].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[1].confidence*100+"%;height:30px\"></div><h5>"+results[1].confidence*100+"%</h5></div></div>");
    bar3.html("<div id=\"home\" class=\"container\">"+results[2].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[2].confidence*100+"%;height:30px\"></div><h5>"+results[2].confidence*100+"%</h5></div></div>");
    bar4.html("<div id=\"home\" class=\"container\">"+results[3].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[3].confidence*100+"%;height:30px\"></div><h5>"+results[3].confidence*100+"%</h5></div></div>");
    bar5.html("<div id=\"home\" class=\"container\">"+results[4].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[4].confidence*100+"%;height:30px\"></div><h5>"+results[4].confidence*100+"%</h5></div></div>");
    bar6.html("<div id=\"home\" class=\"container\">"+results[5].label+" :<div class=\"progress\" style=\"height:30px\"><div class=\"progress-bar \" style=\"width:"+results[4].confidence*100+"%;height:30px\"></div><h5>"+results[5].confidence*100+"%</h5></div></div>");

  
  print(results)

}