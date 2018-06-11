<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <i class="fa fa-globe"></i>
                <select id="lang">
                    <option value="zh" {{App::getLocale() === 'zh' ? 'selected':null}}>zh - 中國</option>
                    <option value="en" {{App::getLocale() === 'en' ? 'selected':null}}>en - English</option>
                    <option value="ko" {{App::getLocale() === 'ko' ? 'selected':null}}>ko - 한국어</option>
                </select>
            </li>
            <li>
                <a id="logout-btn">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>
    </nav>
</div>
