    <div class="form-group">
        <div class="col-sm-6">
            <label>First name*</label>
            <input type="text" class="form-control" name="firstname" placeholder="First name (required)" required="required">
        </div>
        <div class="col-sm-6">
            <label>Last name</label>
            <input type="text" class="form-control" name="lastname" placeholder="Last name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12" for="companyfield">Company (optional)</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" name="companyfield" placeholder="Company name (optional)">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-12">Phone number</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" name="phonenum" placeholder="+1 XXX XXX XXXX">
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="phoneext" placeholder="ext">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12" for="emailfield">Email Address*</label>
        <div class="col-sm-12">
            <input type="email" class="form-control" name="emailfield" placeholder="Email (required)" required="required">
            <span id="emailfield-help" class="help-block" style="display:none;">Wrong E-mail format!</span>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-12">
            <label style="padding-left: 0; font-weight: bold; vertical-align: middle; padding-top: 7px; margin: 0 10px 0 0;">Preferred method of contact</label>
            <label class="radio-inline">
                <input type="radio" name="preferredcontact" value="email">Email
            </label>
            <label class="radio-inline">
                <input type="radio" name="preferredcontact" value="phone">Phone
            </label>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Type of location</label>
        <div class="col-sm-12">
            <select class="form-control" name="locationtype">
                <option value="0">Choose one</option>
                <option>Residential/Home</option>
                <option>Commercial/Business</option>
                <option>Government</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Location material</label>
        <div class="col-sm-12">
            <select class="form-control" name="locationmaterial" >
                <option value="0">Choose one</option>
                <option>Drywall</option>
                <option>Brick</option>
                <option>Concrete</option>
                <option>Other</option>
                <option>I dont know</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="btn-group btn-group-justified col-sm-12" id="inOutDoor" role="group">
            <div class="btn-group" role="group">
                <button type="button" id="indoorButton" class="btn btn-default">Indoor</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="outdoorButton" class="btn btn-default">Outdoor</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="bothButton" class="btn btn-default">Both</button>
            </div>
            <input type="hidden" name="inoutdoor">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Type of camera</label>
        <div class="col-sm-12">
            <select class="form-control" name="cameratype" >
                <option value="0">Choose one</option>
                <option>720p Bullet</option>
                <option>1080p Bullet</option>
                <option>Fully Covered Dome 1080p</option>
                <option>Half Covered Dome 720p</option>
                <option>Wireless 720p Bullet</option>
                <option>Wireless 1080p Bullet</option>
                <option>PTZ</option>
                <option>Wireless PTZ</option>
                <option>Hidden</option>
                <option>License Plate</option>
                <option>Dummy Camera Bullet/Dome</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-12">How many cameras</label>
        <div class="col-sm-12">
            <select class="form-control" name="cameras" >
                <option value="0">Choose one</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>8+</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">How many days of recording</label>
        <div class="col-sm-12">
            <select class="form-control" name="daysofrec" >
                <option value="0">Choose one</option>
                <option>1 day</option>
                <option>1 week</option>
                <option>2 weeks</option>
                <option>1 month</option>
                <option>More than a month</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12" id="monitorSelected">
            <label style="padding-left: 0; font-weight: bold; vertical-align: middle; padding-top: 7px; margin: 0 10px 0 0;">Monitor needed to view cameras?</label>
            <label class="radio-inline">
                <input type="radio" name="monitorneeded" value="yes">Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="monitorneeded" value="no">No
            </label>
        </div>
    </div>

        <!-- start IF YES -->
        <div class="form-group" id="monitorSizeBlock" style="display:none;">
            <label class="col-sm-12" for="monitorSizeField">Monitor Size</label>
            <div class="col-sm-12">
                <select class="form-control" name="monitorsize" >
                    <option value="0">Choose one</option>
                    <option>23 inch</option>
                    <option>32 inch</option>
                    <option>42 inch</option>
                    <option>Larger than 42</option>
                </select>
            </div>
        </div>
        
        <div class="form-group" id="mountedBlock" style="display:none;">
            <label class="col-sm-12">Mounted on</label>
            <div class="col-sm-12">
                <select class="form-control" name="mountedon" >
                    <option value="0">Choose one</option>
                    <option>Wall</option>
                    <option>Ceiling</option>
                    <option>Stand</option>
                </select>
            </div>
        </div>
        <!-- end IF YES -->

    <div class="form-group">
        <div class="col-sm-12" id="inetConnection">
            <label style="padding-left: 0; font-weight: bold; vertical-align: middle; padding-top: 7px; margin: 0 10px 0 0;">Do you have internet connection?</label>
            <label class="radio-inline">
                <input type="radio" name="internetconnection" value="yes">Yes
            </label>
            <label class="radio-inline">
                <input type="radio" name="internetconnection" value="no">No
            </label>
        </div>
    </div>

        <!-- start IF NO -->
        <div class="form-group" id="planToHaveConnectionBlock" style="display:none;">
            <div class="col-sm-12" id="planToHaveConnection">
                <label style="padding-left: 0; font-weight: bold; vertical-align: middle; padding-top: 7px; margin: 0 10px 0 0;">Do you plan on having Internet connection by install date?</label>
                <label class="radio-inline">
                    <input type="radio" name="planinternetconnection" value="yes">Yes
                </label>
                <label class="radio-inline">
                    <input type="radio" name="planinternetconnection" value="no">No
                </label>
            </div>
        </div>
        <!-- end IF NO -->
        
        <!-- start IF YES -->
        <div class="form-group" id="inetTypeBlock" style="display:none;">
            <label class="col-sm-12">What type of internet?</label>
            <div class="col-sm-12">
                <select class="form-control" name="internetconnectiontype">
                    <option value="0">Choose one</option>
                    <option>DSL</option>
                    <option>CABLE</option>
                    <option>FIOS</option>
                    <option>I dont know</option>
                    <option>No internet connection</option>
                </select>
                <span class="help-block">Internet is needed to view with mobile devices or computer.</span>
            </div>
        </div>
        <!-- end IF YES -->
    
    <div class="form-group">
        <label class="col-sm-12">Installation date</label>
        <div class="col-sm-12">
            <select class="form-control" name="installationdate">
                <option value="0">Choose one</option>
                <option>Within 72 hours (Extra fees apply)</option>
                <option>within 7 business days</option>
                <option>within 2 weeks</option>
                <option>No rush</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Please choose date and time</label>
        <div class="col-sm-12">
            <div class="input-group date" id="datetimepicker">
                <span class="input-group-addon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="dateandtime" placeholder="Choose date and time"/>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        jQuery(function ($) {
            $('#datetimepicker').datetimepicker();
        });
    </script>

    <div class="form-group">
        <label class="col-sm-12" style="font-weight: bold;">Checklist of additional features</label>
        <div class="col-sm-12">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="features[]" value="mic">Mic to listen
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="features[]" value="speaker">Speaker to speak
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12" for="uploadFile">Pics of location</label>
        <div class="col-sm-12">
            <input id="fileupload" type="file" name="files[]" multiple>
            <ul id="fileList"></ul>
            <div id="fileListHidden" style="display:none"></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-12">Any Additional Information</label>
        <div class="col-sm-12">
            <textarea class="form-control" name="additionalinfo"></textarea>
        </div>
    </div>

    <button type="submit" class="sppb-btn sppb-btn-default sppb-btn-square"><i class="fa"></i> Submit <i class="fa fa-send-o"></i></button>