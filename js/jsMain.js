const wrapperEl = document.querySelector('.wrapper');
const numberOfEls = 90;
const duration = 6000;
const delay = duration / numberOfEls;

let tl = anime.timeline({
  duration: delay,
  complete: function() { tl.restart(); }
});

function createEl(i) {
  let el = document.createElement('div');
  const rotate = (360 / numberOfEls) * i;
  const translateY = -50;
  const hue = Math.round(360 / numberOfEls * i);
  el.classList.add('el');
  el.style.backgroundColor = 'hsl(' + hue + ', 40%, 60%)';
  el.style.transform = 'rotate(' + rotate + 'deg) translateY(' + translateY + '%)';
  tl.add({
    begin: function() {
      anime({
        targets: el,
        backgroundColor: ['hsl(' + hue + ', 40%, 60%)', 'hsl(' + hue + ', 60%, 80%)'],
        rotate: [rotate + 'deg', rotate + 10 +'deg'],
        translateY: [translateY + '%', translateY + 10 + '%'],
        scale: [1, 1.25],
        easing: 'easeInOutSine',
        direction: 'alternate',
        duration: duration * .1
      });
    }
  });
  wrapperEl.appendChild(el);
};

for (let i = 0; i < numberOfEls; i++) createEl(i);


var loop = true;
var easing = 'linear';
var direction = 'alternate';

anime({
  targets: '.ball',
  translateX: 470,
  translateY: 100,
  easing,
  loop,
  direction,
  background: [
    { value: '#573796' },
    { value: '#FB89FB' },
    { value: '#FBF38C' },
    { value: '#18FF92' },
    { value: '#5A87FF' }
  ]
})
var ballTimeline = anime.timeline({
  loop,
  direction
})
var bar2Timeline = anime.timeline({
  loop,
  direction
})
var bar1Timeline = anime.timeline({
  loop,
  direction
})
ballTimeline
.add({
  targets: '.ball',
  translateY: 100,
  translateX: 470,
  easing
}).add({
  targets: '.ball',
  translateY: 0,
  translateX: 0,
  easing
}).add({
  targets: '.ball',
  translateY: '-80',
  translateX: 470,
  easing
})
bar2Timeline
.add({
  targets: '.bar2',
  translateY: 100,
  easing,
  background: '#573796'
}).add({
  targets: '.bar2',
  translateY: 0,
  easing,
  background: '#FB89FB'
}).add({
  targets: '.bar2',
  translateY: '-100',
  easing,
  background: '#FBF38C'
})
bar1Timeline
.add({
  targets: '.bar1',
  translateY: '-80',
  easing,
  background: '#18FF92'
}).add({
  targets: '.bar1',
  translateY: 10,
  easing,
  background: '#5A87FF'
}).add({
  targets: '.bar1',
  translateY: 60,
  easing,
  background: '#FF1461'
})

const pong = document.querySelector(".pong");


const wrapper = document.querySelector(".circle");


setTimeout(function(){
wrapper.setAttribute("class","d-none");
pong.setAttribute("class","d-block");

}, 10000);
