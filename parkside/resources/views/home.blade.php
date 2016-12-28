<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Parkside Lending: Loan Application</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/app.css">
        <script>
            window.Laravel = { csrfToken: '{{ csrf_token() }}' };
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
              <h1 class="text-center">Parkside: Loan Center</h1>
            </div>
            <div class="row center-block">
              <h3 class="text-center">Apply for New Loan</h3>
              <form class="form-horizontal" action="/api/submit" method="post" v-ajax>
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="inputAmount" class="col-sm-4 control-label">Requested Loan Amount:</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <div class="input-group-addon">$</div>
                      <input type="text" class="form-control" id="inputAmount" name="inputAmount" placeholder="enter amount">
                      <div class="input-group-addon">.00</div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPropertyValue" class="col-sm-4 control-label">Property Value:</label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <div class="input-group-addon">$</div>
                      <input type="text" class="form-control" id="inputPropertyValue" name="inputPropertyValue" placeholder="enter amount">
                      <div class="input-group-addon">.00</div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputSSN" class="col-sm-4 control-label">Social Security Number:</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="inputSSN" name="inputSSN" autocomplete="off" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="submit">Submit Application</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
        <script src="/js/app.js" charset="utf-8"></script>
    </body>
</html>
