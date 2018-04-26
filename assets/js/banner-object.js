'use strict';

function banner(bannerStatus, bannerMessage){
  this.bannerStatus = bannerStatus;
  this.bannerMessage = bannerMessage;
  this.bannerHtml = '';
}

banner.prototype = {
  returnHtml: () => {
    switch (this.bannerStatus){
      case 'success':
      this.bannerHtml = '<div class="alert alert-success fade in m-b-15 file-name-okay">' +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span></button>' +
      this.bannerMessage +
      '</div>';
      break;

    case 'warning':
      this.bannerHtml = '<div class="alert alert-warning fade in m-b-15 file-name-okay">' +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span></button>' +
      this.bannerMessage +
      '</div>';
      break;

    case 'error':
      this.bannerHtml = '<div class="alert alert-danger fade in m-b-15 file-name-error">' +
      '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
      '<span aria-hidden="true">&times;</span></button>' +
      this.bannerMessage +
      '</div>';
      break;
    }

    return this.bannerHtml;
  }
};
