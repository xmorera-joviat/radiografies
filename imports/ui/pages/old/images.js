Template.imatges.helpers({

  images: function () {
    console.log('dins');
    return Images.find(); // Where Images is an FS.Collection instance
  }
});
