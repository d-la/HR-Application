'use strict';

$(document).ready(function(){
  if ($(window).width() < 535){
    $('#side-bar').removeClass('slide-in');
    $('#side-bar-bottom').removeClass('slide-in');
  }
  // handleMobileSideBar();
  handleSideBar();
  handlePanelButtons();
});

// var handleMobileSideBar = function(){
//
//   if ($(window).width() < 535){
//     $('[data-click=toggle-sidebar]').on('click', function(e){
//       e.preventDefault();
//
//       if ($('aside').hasClass('aside-mobile')){
//         // Minify Sidebar
//         $('aside').removeClass('aside-mobile');
//         $('.end-sidebar').removeClass('aside-mobile');
//         $('#content').removeClass('content-mobile');
//         $('nav#navigation').removeClass('navbar-mobile');
//       } else {
//         // Expand Sidebar
//         $('aside').addClass('aside-mobile');
//         $('.end-sidebar').addClass('aside-mobile');
//         $('#content').addClass('content-mobile');
//         $('nav#navigation').addClass('navbar-mobile');
//       }
//     });
//   }
// }

var handleSideBar = function(){
  // Initialize sideBarToggle Button
  // let sideBarToggle = $('a[data-click=toggle-sidebar]');
  //
  // let sideBar = $('aside');
  // let sideBarBg = $('#end-sidebar');
  // let content = $('div#content');
  // let navigation = $('nav#navigation');
  //
  // $(sideBarToggle).on('click', function(e){
  //   e.preventDefault();
  //
  //   if ($(sideBar).hasClass('aside')){
  //     // Expand Sidebar
  //     $(sideBar).removeClass('aside').addClass('sidebar-hidden');
  //     $(sideBarBg).removeClass('sidebar-bg').addClass('sidebar-hidden');
  //     $(content).removeClass('content').addClass('content-full');
  //     $(navigation).removeClass('navbar-custom');
  //
  //   } else {
  //     // Minify Sidebar
  //     $(sideBar).removeClass('sidebar-hidden').addClass('aside');
  //     $(sideBarBg).removeClass('sidebar-hidden').addClass('sidebar-bg');
  //     $(content).removeClass('content-full').addClass('content');
  //     $(navigation).addClass('navbar-custom');
  //
  //   }
  //
  // });

  let sideBar = $('#side-bar');
  let sideBarBottom = $('#side-bar-bottom');
  let navBar = $('#navigation');
  let content = $('#content');

  if ($(window).width() < 535){
    // When mobile, remove the slide-in class so
    // the first button click slides in side-bar in

    $('[data-click=toggle-sidebar]').on('click', function(e){
      let isOpen = $(sideBar).hasClass('slide-in');
      let bottomOpen = $(sideBarBottom).hasClass('slide-in');
      e.preventDefault();

      $(sideBar).attr('class', isOpen ? 'slide-out' : 'slide-in');
      $(sideBarBottom).attr('class', bottomOpen ? 'slide-out' : 'slide-in');
      // $(content).attr('class', isOpen ? 'content-full' : 'content');
      $(navBar).toggleClass('navbar-mobile', isOpen);
    });
  } else {
    $('a[data-click=toggle-sidebar]').on('click', function(e){
      e.preventDefault();
      let isOpen = $(sideBar).hasClass('slide-in');
      let bottomOpen = $(sideBarBottom).hasClass('slide-in');

      $(sideBar).attr('class', isOpen ? 'slide-out' : 'slide-in');
      $(sideBarBottom).attr('class', bottomOpen ? 'slide-out' : 'slide-in');
      $(content).attr('class', isOpen ? 'content-full' : 'content');
      $(navBar).toggleClass('navbar-custom', !isOpen);
    });
  }
// });







}

var handlePanelButtons = function(){

  /**
   * Panel Close Button
   *
   */
  let panelCloseButton = $('a[data-click=panel-close]');

  $(panelCloseButton).on('click', function(e){
    e.preventDefault();

    let panelContainer = $(this).parents('div.panel');
    let panelBody = $(panelContainer).find('div.panel-body');
    $(panelBody).slideToggle();

  });
}
