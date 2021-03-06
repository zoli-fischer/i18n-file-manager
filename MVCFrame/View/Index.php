<?php
    $this->Partial('Header', [
        'title' => 'i18n file manager'
    ]);
?>
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
                        <caption>Languages: 
                            <?=$this->printLanguages();?> 
                            <a href="javascript:{}" data-toggle="modal" data-target="#addLanguageModal" title="" class="badge badge-pill badge-secondary"><i class="fas fa-plus"></i> Add</a>
                        </caption>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 100%">Collection</th>
                                <th scope="col" class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="align-middle" scope="row">
                                    <a href="#">global</a> 
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
                                        <button type="button" class="btn btn-info"><i class="fas fa-upload"></i> Import</button>
                                        <button type="button" class="btn btn-info"><i class="fas fa-download"></i> Export</button>
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
                    <h5 class="modal-title">Help </h5>
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

    <div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog" aria-labelledby="addLanguageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add language </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=MVCFrame\Url::GetBaseUrl()?>">
                            <input type="hidden" name="command" value="">
                            <input type="hidden" name="real_index" value="">
                            <div class="form-group">
                                <label for="formIndex">Index</label>
                                <input type="text" id="formIndex" name="index" class="form-control">
                                <small class="form-text text-muted">en, da, en_US</small>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="default" value="1" id="formDefault">
                                    <label class="form-check-label" for="formDefault">
                                        Default
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formName">Name</label>
                                <input type="text" id="formName" name="name" class="form-control">
                                <small class="form-text text-muted">English, Dansk</small>
                            </div>
                            <div class="form-group">
                                <label for="formPrularRule">Plural rule</label>
                                <select class="form-control" id="formPrularRule" name="prular_rule">
                                    <option value="0">Asian (Chinese, Japanese, Korean), Persian, Turkic/Altaic (Turkish), Thai, Lao</option>
                                    <option value="1">Germanic (Danish, Dutch, English, Faroese, Frisian, German, Norwegian, Swedish), Finno-Ugric (Estonian, Finnish, Hungarian), Language isolate (Basque), Latin/Greek (Greek), Semitic (Hebrew), Romanic (Italian, Portuguese, Spanish, Catalan), Vietnamese</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formDecPoint">Dec. point</label>
                                <input type="text" id="formDecPoint" class="form-control" name="dec_point">
                            </div>
                            <div class="form-group">
                                <label for="formThousandSep">Thousands sep.</label>
                                <input type="text" id="formThousandSep" class="form-control" name="thousands_sep">
                            </div>
                            <div class="form-group">
                                <label for="formDateFormat">Date format</label>
                                <input type="text" id="formDateFormat" class="form-control" name="date_format">
                                <small class="form-text text-muted">d.m.y, Y/m/d</small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger mr-auto" data-index="" data-dismiss="modal" data-toggle="modal" data-target="#deleteLanguageModal">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deleteLanguageModal" tabindex="-1" role="dialog" aria-labelledby="deleteLanguageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete language: <code></code></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?=MVCFrame\Url::GetBaseUrl()?>">
                            <input type="hidden" name="command" value="delete-language">
                            <div class="form-group">
                                <label for="formIndex">Please type in the language index you want to delete</label>
                                <input type="text" id="formIndex" name="index" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Add</button>
                </div>
            </div>
        </div>
    </div>

<?php 
    $this->Partial('Footer'); 
?>