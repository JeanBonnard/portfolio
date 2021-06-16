let modals = document.querySelectorAll('.bubble-link');
let sides = document.querySelector('.sides');

let contentModal = {
    0 : { language : 'HTML', name: 'htmlLogo' , title: 'Mes compétences en html', description : 'loremipsum', img: 'img/html1.png', etoile :'img/etoile4.5.png'},
    1 : { language : 'JAVASCRIPT', name: 'jsLogo' , title: 'Mes compétences en js', description : 'loremipsum', img: 'img/js1.png', etoile :'img/etoile4.png'},
    2 : { language : 'BOOTSTRAP', name: 'bootLogo' , title: 'Mes compétences en bootstrap', description : 'loremipsum', img: 'img/boot.png', etoile :'img/etoile4.png'},
    3 : { language : 'PYTHON', name: 'pyLogo' , title: 'Mes compétences en python', description : 'loremipsum', img: 'img/python.png', etoile :'img/etoile3.png'},
    4 : { language : 'CSS', name: 'cssLogo' , title: 'Mes compétences en css', description : 'loremipsum', img: 'img/css1.png', etoile :'img/etoile4.5.png'},
    5 : { language : 'SQL', name: 'sqlLogo' , title: 'Mes compétences en sql', description : 'loremipsum', img: 'img/sql.png', etoile :'img/etoile3.5.png'},
    6 : { language : 'PHP', name: 'phpLogo' , title: 'Mes compétences en php', description : 'loremipsum', img: 'img/php.png' , etoile :'img/etoile4.png'}
};

modals.forEach((modal,key)=>{
    sides.innerHTML += '<div class="side" id='+contentModal[key].name+' >\n' +
    '              <div class="ui card">\n' +
        '<div class="flex">'+
    '                  <div class="image">\n' +
    '                      <img style="width: 10vw;" src='+contentModal[key].img+'>\n' +
    '                  </div>\n' +
        '</div>'+
    '                  <div class="content">\n' +
    '                      <div class="header">'+contentModal[key].language+'</div>\n' +
    '                      <div class="meta">\n' +
    '                          <a>'+ contentModal[key].title+'</a>\n' +
    '                      </div>\n' +
    '                      <div class="description">\n' +
    '                          <img src='+ contentModal[key].etoile+'>\n' +
    '                      </div>\n' +
    '                  </div>\n' +
    '                  <div class="extra content">\n' +
    '                      <span class=" floated"><img style="float: left; width: 8vw"></span>\n' +
    '                      <span><i class="user icon"></i> 151 amis </span>\n' +
    '                  </div>\n' +
        '<div class="row">'+
                        '<button class="top ui button shape" data-animation="flip" data-direction="up"><i class="up arrow icon"></i></button>\n' +
        '</div>'+
        '<div class="row" style="display: flex;justify-content: space-around;width: 20vw;margin-left: 7.95vw;">'+
    '                  <button class="left-btn ui button shape" data-animation="flip" data-direction="left"><i class="left arrow icon"></i></button>\n' +
    '                  <button class="right-btn ui button shape" data-animation="flip" data-direction="right"><i class="right arrow icon"></i></button>\n' +
        '</div>'+
        '<div class="row">'+
    '                  <button class="bottom ui button shape" data-animation="flip" data-direction="down"><i class="down arrow icon"></i></button>\n' +
        '</div>'+
    '              </div>\n' +
    '          </div>';
    modal.addEventListener('click',function(e){
        document.querySelector('.side#'+e.target.id).classList.add('active')
    });
});


