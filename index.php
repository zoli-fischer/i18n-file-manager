<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>i18n file manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-sm-12 text-right">
                <a href="javascript:{}" data-toggle="modal" data-target="#helpModal" title="" class="badge badge-pill badge-primary">Do you need help <i class="fas fa-question"></i></a>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-6">
                <h1>i18n file manager</h1>                
            </div>
            <div class="col-sm-6">
                <form class="md-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search in all collections...">
                        <div class="input-group-append">
                                <button type="button" class="btn btn-secondary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <caption>Languages: en, da, de</caption>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 100%">Collection</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="align-middle" scope="row">
                                    <a href="#">config</a> 
                                    <form class="d-block w-75">
                                         <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-sm btn-secondary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form> 
                                </th>
                                <td class="align-middle text-right">
                                    <div class="btn-group" role="group" aria-label="Import/Export">
                                        <button type="button" class="btn btn-info"><i class="fas fa-file-import"></i> Import</button>
                                        <button type="button" class="btn btn-info"><i class="fas fa-file-export"></i> Export</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpModalLabel">Help </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <h3>Import</h3>
                        <p>Required CSV format:</p>
                        <code>
                            "","&lt;language-index&gt","&lt;language-index&gt","&lt;language-index&gt",...<br>
                            "&lt;i18n-index&gt;","&lt;text&gt","&lt;text&gt","&lt;text&gt",...<br>
                            "&lt;i18n-index&gt;","&lt;text&gt","&lt;text&gt","&lt;text&gt",...<br>
                            "&lt;i18n-index&gt;","&lt;text&gt","&lt;text&gt","&lt;text&gt",...<br>
                            "&lt;i18n-index&gt;","&lt;text&gt","&lt;text&gt","&lt;text&gt",...<br>
                            ......
                        </code>
                        <p>&nbsp;</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>