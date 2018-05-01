function callAjax(dataObject){
  return $.ajax({
    url: dataObject.url,
    method: dataObject.method,
    data: dataObject.data
  });
}
