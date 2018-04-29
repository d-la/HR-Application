function callAjax(dataObject){
  console.log(dataObject);
  console.log(dataObject.data);
  return $.ajax({
    url: dataObject.url,
    type: dataObject.type,
    data: dataObject.data
  });
}
