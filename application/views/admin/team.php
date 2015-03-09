
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row  team_box">

                <div class="col-md-8">
                    <ul class="team_list">
                        <h4>About Dragons</h4>
                        <div class="m_7">
                            <div class="admin">

                                <form method="post" action="/admin/team/confirm/about">
                                    <textarea id="about" name="about">{about}</textarea><br/>
                                    <div class="error">{about_error}</div>
                                    <div class="form-submit">
                                        <input name="submit" type="submit" id="submit" value="Save About"><br/><br/>
                                    </div>
                                </form>
                            </div>
                            <img src="/assets/images/team/team.jpg" class="img-responsive" alt=""/>
                    </ul>
                </div>
                <div class="col-md-4 ">
                    <ul class="team_list">
                        <h4>History</h4>
                        <div class="error">{history_error}</div>
                        <form method="post" action="/admin/team/confirm/history">
                            <div class="admin">
                                {history}
                            </div>
                            <div class="form-submit">
                                <input name="submit" type="submit" id="submit" value="Save History"><br/><br/>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>

            <div class="row team_bottom">
                                <form method="post" action="/admin/team/confirm/p1">

                <div class="col-md-3 admin">
                    <img src="/assets/images/team/{pImg1}" class="img-responsive" title="continue" alt=""/>
                    <div class="error">{p1_error}</div>
                </div>
                    <div class="col-md-3 admin">
                        Title<input id="pTitle1" name="pTitle1" type="text" class="text" value="{pTitle1}"><br/>
                        Name<input id="pName1" name="pName1" type="text" class="text" value="{pName1}"><br/>
                        Comments
                        <textarea id="pDescription1" class="pDescription" name="pDescription1">{pDescription1}</textarea>
                    <div class="form-submit">
                        <input name="submit" type="submit" id="submit" value="Save"><br/><br/>
                    </div>
                    </div>
                    
                </form>
                <form method="post" action="/admin/team/confirm/p2">

                <div class="col-md-3 admin">
                    <img src="/assets/images/team/{pImg2}" class="img-responsive" title="continue" alt=""/>
                    <div class="error">{p2_error}</div>
                </div>
                    <div class="col-md-3 admin">
                        Title<input id="pTitle2" name="pTitle2" type="text" class="text" value="{pTitle2}"><br/>
                        Name<input id="pName2" name="pName2" type="text" class="text" value="{pName2}"><br/>
                        Comments
                        <textarea id="pDescription2" class="pDescription" name="pDescription2">{pDescription2}</textarea>
                    <div class="form-submit">
                        <input name="submit" type="submit" id="submit" value="Save"><br/><br/>
                    </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
</div>
