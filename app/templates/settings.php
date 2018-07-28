<div class="container">
    <h1>Settings</h1>
    <form class="form-horizontal" action="" method="post" role="form"> 
        <fieldset>
            <legend>Environment</legend>
			<div class="form-group" id="systemstatus">
                <label class="control-label col-sm-2">Check system status</label>
                <div class="col-sm-10">
                    <a class="btn btn-default btn-lg" href="#modal-sysinfo" data-toggle="modal"><i class="fa fa-info-circle sx"></i>show status</a>
                    <span class="help-block">See information regarding the system and its status</span>
                </div>
            </div>
            <div class="form-group" id="environment">
                <label class="control-label col-sm-2" for="hostname">Player hostname</label>
                <div class="col-sm-10">
                    <input class="form-control osk-trigger input-lg" type="text" id="hostname" name="hostname" value="<?php echo $this->hostname; ?>" placeholder="runeaudio" autocomplete="off">
                    <span class="help-block">Set the player hostname. This will change the address used to reach the RuneUI.<br>
					No <strong>spaces</strong> or <strong>special charecters</strong> allowed in the name</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="ntpserver">NTP server</label>
                <div class="col-sm-10">
                    <input class="form-control osk-trigger input-lg" type="text" id="ntpserver" name="ntpserver" value="<?php echo $this->ntpserver; ?>" placeholder="pool.ntp.org" autocomplete="off">
                    <span class="help-block">Set your reference time sync server <i>(NTP server)</i></span>
                </div>
            </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="timezone">Timezone</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="timezone" data-style="btn-default btn-lg">
                    <?php foreach(ui_timezone() as $t): ?>
                      <option value="<?=$t['zone'] ?>" <?php if($this->timezone === $t['zone']): ?> selected <?php endif; ?>>
                        <?=$t['zone'].' - '.$t['diff_from_GMT'] ?>
                      </option>
                    <?php endforeach; ?>
                    </select>
                    <span class="help-block">Set the system timezone</span>
                </div>
            </div>
            <!-- <div <?php if($this->proxy['enable'] === 1): ?>class="boxed-group"<?php endif ?> id="proxyBox">
                <div class="form-group">
                    <label for="proxy" class="control-label col-sm-2">HTTP Proxy server</label>
                    <div class="col-sm-10">
                        <label class="switch-light well" onclick="">
                            <input id="proxy" name="features[proxy]" type="checkbox" value="1"<?php if($this->proxy['enable'] == 1): ?> checked="checked" <?php endif ?>>
                            <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                        </label>
                    </div>
                </div>
                <div class="<?php if($this->proxy['enable'] != 1): ?>hide<?php endif ?>" id="proxyAuth">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="proxy-user">Host</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="text" id="proxy_host" name="features[proxy][host]" value="<?php echo $this->proxy['host']; ?>" data-trigger="change" placeholder="<host IP or FQDN>:<port>">
                            <span class="help-block">Insert HTTP Proxy host<i> (format: proxy_address:port)</i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="proxy-user">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="text" id="proxy_user" name="features[proxy][user]" value="<?php echo $this->proxy['user']; ?>" data-trigger="change" placeholder="user">
                            <span class="help-block">Insert your HTTP Proxy <i>username</i> (leave blank for anonymous authentication)</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="proxy-pass">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="password" id="proxy_pass" name="features[proxy][pass]" value="<?php echo $this->proxy['pass']; ?>" placeholder="pass" autocomplete="off">
                            <span class="help-block">Insert your HTTP Proxy <i>password</i> (case sensitive) (leave blank for anonymous authentication)</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="form-group form-actions">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary btn-lg" value="save" name="save" type="submit">Apply settings</button>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="form-horizontal" method="post" role="form">
        <fieldset>
            <legend>RuneOS kernel settings</legend>
            <?php if($this->hwplatformid === '01'): ?>
            <!--
            <div class="form-group">
                <label class="control-label col-sm-2" for="i2smodule">Linux Kernel</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="kernel" data-style="btn-default btn-lg">
                        <option value="linux-arch-rpi_3.12.26-1-ARCH" <?php if($this->kernel === 'linux-arch-rpi_3.12.26-1-ARCH'): ?> selected <?php endif ?>>Linux kernel 3.12.26-1&nbsp;&nbsp;&nbsp;ARCH&nbsp;[RuneAudio v0.3-beta]</option>
                        <option value="linux-rune-rpi_3.12.19-2-ARCH" <?php if($this->kernel === 'linux-rune-rpi_3.12.19-2-ARCH'): ?> selected <?php endif ?>>Linux kernel 3.12.19-2&nbsp;&nbsp;&nbsp;RUNE&nbsp;[RuneAudio v0.3-alpha]</option>
                        <option value="linux-rune-rpi_3.6.11-18-ARCH+" <?php if($this->kernel === 'linux-rune-rpi_3.6.11-18-ARCH+'): ?> selected <?php endif ?>>Linux kernel 3.6.11-18&nbsp;&nbsp;&nbsp;ARCH+&nbsp;[RuneAudio v0.1-beta/v0.2-beta]</option>
                        <option value="linux-rune-rpi_3.12.13-rt21_wosa" <?php if($this->kernel === 'linux-rune-rpi_3.12.13-rt21_wosa'): ?> selected <?php endif ?>>Linux kernel 3.12.13-rt&nbsp;&nbsp;&nbsp;RUNE-RT&nbsp;[Wolfson Audio Card]</option>
                    </select>
                    <span class="help-block">Switch Linux Kernel version (REBOOT REQUIRED). <strong>Linux kernel 3.12.26-1</strong> is the default kernel in the current release, <strong>Linux kernel 3.12.19-2</strong> is the kernel used in RuneAudio v0.3-alpha, <strong>Linux kernel 3.6.11-18</strong> is the kernel used in RuneAudio v0.1-beta/v0.2-beta (it has no support for I&#178;S), <strong>Linux kernel 3.12.13-rt</strong> is an EXPERIMENTAL kernel (not suitable for all configurations), it is optimized for <strong>Wolfson Audio Card</strong> support and it is the default option for that type of soundcard</span>
                </div>
                <label class="control-label col-sm-2" for="i2smodule">I&#178;S kernel modules</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="i2smodule" data-style="btn-default btn-lg" <?php if($this->kernel === 'linux-rune-rpi_3.12.13-rt21_wosa' OR $this->kernel === 'linux-rune-rpi_3.6.11-18-ARCH+'): ?>disabled<?php endif; ?>>
                        <?php if($this->kernel !== 'linux-rune-3.12.13-rt21_wosa'): ?>
                        <option value="none" <?php if($this->i2smodule === 'none'): ?> selected <?php endif ?>>I&#178;S disabled (default)</option>
                        <option value="berrynos" <?php if($this->i2smodule === 'berrynos'): ?> selected <?php endif ?>>G2Labs BerryNOS</option>
                        <option value="berrynosmini" <?php if($this->i2smodule === 'berrynosmini'): ?> selected <?php endif ?>>G2Labs BerryNOS mini</option>
                        <option value="hifiberrydac" <?php if($this->i2smodule === 'hifiberrydac'): ?> selected <?php endif ?>>HiFiBerry DAC</option>
                        <option value="hifiberrydacplus" <?php if($this->i2smodule === 'hifiberrydacplus'): ?> selected <?php endif ?>>HiFiBerry DAC+</option>
                        <option value="hifiberrydigi" <?php if($this->i2smodule === 'hifiberrydigi'): ?> selected <?php endif ?>>HiFiBerry Digi / Digi+</option>
                        <option value="iqaudiopidac" <?php if($this->i2smodule === 'iqaudiopidac'): ?> selected <?php endif ?>>IQaudIO Pi-DAC / Pi-DAC+</option>
                        <option value="raspyplay3" <?php if($this->i2smodule === 'raspyplay3'): ?> selected <?php endif ?>>RaspyPlay3</option>
                        <option value="raspyplay4" <?php if($this->i2smodule === 'raspyplay4'): ?> selected <?php endif ?>>RaspyPlay4</option>
                        <?php else: ?>
                        <option value="wolfsonaudiocard"  selected >Wolfson Audio Card</option>
                        <?php endif ?>
                    </select>
					<input class="form-control input-lg" type="text" id="overlay" name="overlay" value="<?php echo $this->i2smodule; ?>" disabled autocomplete="off">
                    <span class="help-block">Enable I&#178;S output selecting one of the available drivers, specific for each hardware. <strong>After rebooting</strong> the output interface will appear in the <a href="/mpd/">MPD configuration select menu</a>, and drivers will also auto-load from the next reboot.<br>
					After selecting your hardware the 'best choice' driver will be selected. Because some drivers are used for different hardware types it is possible, after a screen refresh, that the hardware which is displayed is not the one which you chose</span>
                </div>
            </div>
            -->
            <div class="form-group">
                <label class="control-label col-sm-2" for="kernel">Linux Kernel</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="kernel" data-style="btn-default btn-lg">
                        <option value="<?php echo $this->kernel; ?>"><?php echo $this->kernel; ?></option>
                    </select>
                    <span class="help-block">No other kernels available</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="i2smodule">I&#178;S kernel modules</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="i2smodule" data-style="btn-default btn-lg">
						<option value="none" <?php if($this->i2smodule === 'none'): ?> selected <?php endif ?>>I&#178;S disabled (default)</option>
						<option value="allo-boss-dac-pcm512x-audio" <?php if($this->i2smodule === 'allo-boss-dac-pcm512x-audio'): ?> selected <?php endif ?>>Allo Boss DAC</option>
						<option value="allo-digione" <?php if($this->i2smodule === 'allo-digione'): ?> selected <?php endif ?>>Allo DigiOne</option>
						<option value="allo-piano-dac-plus-pcm512x-audio" <?php if($this->i2smodule === 'allo-piano-dac-plus-pcm512x-audio'): ?> selected <?php endif ?>>Allo Piano 2.1 DAC Plus</option>
						<option value="allo-piano-dac-pcm512x-audio" <?php if($this->i2smodule === 'allo-piano-dac-pcm512x-audio'): ?> selected <?php endif ?>>Allo Piano DAC</option>
						<option value="applepi-dac" <?php if($this->i2smodule === 'applepi-dac'): ?> selected <?php endif ?>>Apple Pi DAC</option>
						<option value="audioinjector-addons" <?php if($this->i2smodule === 'audioinjector-addons'): ?> selected <?php endif ?>>Audioinjector Addons</option>
						<option value="audioinjector-addons" <?php if($this->i2smodule === 'audioinjector-addons'): ?> selected <?php endif ?>>Audioinjector Octo soundcard</option>
						<option value="audioinjector-wm8731-audio" <?php if($this->i2smodule === 'audioinjector-wm8731-audio'): ?> selected <?php endif ?>>Audioinjector Stereo soundcard</option>
						<option value="audioinjector-wm8731-audio" <?php if($this->i2smodule === 'audioinjector-wm8731-audio'): ?> selected <?php endif ?>>Audioinjector WM8731 Audio</option>
						<option value="audioinjector-wm8731-audio" <?php if($this->i2smodule === 'audioinjector-wm8731-audio'): ?> selected <?php endif ?>>Audioinjector Zero soundcard</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9023</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9023 / AMP</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9028Q2M</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9038Q2M</option>
						<option value="akkordion-iqdacplus" <?php if($this->i2smodule === 'akkordion-iqdacplus'): ?> selected <?php endif ?>>Digital Dreamtime Akkordion</option>
						<option value="dionaudio-loco" <?php if($this->i2smodule === 'dionaudio-loco'): ?> selected <?php endif ?>>Dionaudio Loco DAC-AMP</option>
						<option value="dionaudio-loco-v2" <?php if($this->i2smodule === 'dionaudio-loco-v2'): ?> selected <?php endif ?>>Dionaudio Loco V2 DAC-AMP</option>
						<option value="fe-pi-audio" <?php if($this->i2smodule === 'fe-pi-audio'): ?> selected <?php endif ?>>Fe-Pi Audio Sound Card</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>Generic ES9023</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>Generic ES90x8</option>
						<option value="hifiberry-dac,384k" <?php if($this->i2smodule === 'hifiberry-dac,384k'): ?> selected <?php endif ?>>Generic PCM510x</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>Generic PCM512x</option>
						<option value="hifiberry-amp" <?php if($this->i2smodule === 'hifiberry-amp'): ?> selected <?php endif ?>>HiFIBerry Amp</option>
						<option value="hifiberry-dac,384k" <?php if($this->i2smodule === 'hifiberry-dac,384k'): ?> selected <?php endif ?>>HiFIBerry DAC</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Lite</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Pro</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Pro XLR</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus RTC</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Standard</option>
						<option value="hifiberry-dac,384k" <?php if($this->i2smodule === 'hifiberry-dac,384k'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Zero</option>
						<option value="hifiberry-digi" <?php if($this->i2smodule === 'hifiberry-digi'): ?> selected <?php endif ?>>HiFIBerry Digi</option>
						<option value="hifiberry-digi" <?php if($this->i2smodule === 'hifiberry-digi'): ?> selected <?php endif ?>>HiFIBerry Digi Plus</option>
						<option value="hifiberry-digi-pro" <?php if($this->i2smodule === 'hifiberry-digi-pro'): ?> selected <?php endif ?>>HiFIBerry Digi Pro</option>
						<option value="iqaudio-dacplus,unmute_amp" <?php if($this->i2smodule === 'iqaudio-dacplus,unmute_amp'): ?> selected <?php endif ?>>IQaudIO Amp</option>
						<option value="iqaudio-dac" <?php if($this->i2smodule === 'iqaudio-dac'): ?> selected <?php endif ?>>IQaudIO DAC</option>
						<option value="iqaudio-dacplus" <?php if($this->i2smodule === 'iqaudio-dacplus'): ?> selected <?php endif ?>>IQaudIO DAC Plus</option>
						<option value="iqaudio-dacplus" <?php if($this->i2smodule === 'iqaudio-dacplus'): ?> selected <?php endif ?>>IQaudIO DAC Pro</option>
						<option value="iqaudio-digi-wm8804-audio" <?php if($this->i2smodule === 'iqaudio-digi-wm8804-audio'): ?> selected <?php endif ?>>IQaudIO Digi wm8804 audio</option>
						<option value="iqaudio-dacplus" <?php if($this->i2smodule === 'iqaudio-dacplus'): ?> selected <?php endif ?>>IQaudIO Pi-DACZero</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom Amp HAT</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom Amp Zero</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom DAC</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom DAC HAT</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom DAC Zero</option>
						<option value="justboom-digi" <?php if($this->i2smodule === 'justboom-digi'): ?> selected <?php endif ?>>JustBoom Digi</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>PIFi DAC Plus</option>
						<option value="raspidac3" <?php if($this->i2smodule === 'raspidac3'): ?> selected <?php endif ?>>RaspiDAC3</option>
						<option value="rra-digidac1-wm8741-audio" <?php if($this->i2smodule === 'rra-digidac1-wm8741-audio'): ?> selected <?php endif ?>>Red Rocks Audio DigiDAC1 soundcard</option>
						<option value="rpi-cirrus-wm5102" <?php if($this->i2smodule === 'rpi-cirrus-wm5102'): ?> selected <?php endif ?>>RPi Cirrus WM5102</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>RPi DAC</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>Sabre DAC (all models)</option>
                    </select>
					<input class="form-control input-lg" type="text" id="overlay" name="overlay" value="<?php echo $this->i2smodule; ?>" disabled autocomplete="off">
                    <span class="help-block">Enable I&#178;S output selecting one of the available drivers, specific for each hardware. <strong>After rebooting</strong> the output interface will appear in the <a href="/mpd/">MPD configuration select menu</a>, and drivers will also auto-load from the next reboot.<br>
					After selecting your hardware the 'best choice' driver will be selected. Because some drivers are used for different hardware types it is possible, after a screen refresh, that the hardware which is displayed is not the one which you chose</span>
                </div>
            </div>
            <div class="form-group">
                <label for="audio_on_off" class="control-label col-sm-2">HDMI & 3,5mm jack</label>
                <div class="col-sm-10">
                    <label class="switch-light well" onclick="">
                        <input name="audio_on_off" type="checkbox" value="1"<?php if($this->audio_on_off == 1): ?> checked="checked" <?php endif ?>>
                        <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                    </label>
                    <span class="help-block">Set "ON" to enable or "OFF" to disable the onboard ALSA audio interface)</span>
                </div>
            </div>
            <?php endif;?>
            <?php if($this->hwplatformid === '08'): ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="kernel">Linux Kernel</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="kernel" data-style="btn-default btn-lg">
                        <option value="<?php echo $this->kernel; ?>"><?php echo $this->kernel; ?></option>
                    </select>
                    <span class="help-block">No other kernels available.</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="i2smodule">I&#178;S kernel modules</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="i2smodule" data-style="btn-default btn-lg">
						<option value="none" <?php if($this->i2smodule === 'none'): ?> selected <?php endif ?>>I&#178;S disabled (default)</option>
						<option value="allo-boss-dac-pcm512x-audio" <?php if($this->i2smodule === 'allo-boss-dac-pcm512x-audio'): ?> selected <?php endif ?>>Allo Boss DAC</option>
						<option value="allo-digione" <?php if($this->i2smodule === 'allo-digione'): ?> selected <?php endif ?>>Allo DigiOne</option>
						<option value="allo-piano-dac-plus-pcm512x-audio" <?php if($this->i2smodule === 'allo-piano-dac-plus-pcm512x-audio'): ?> selected <?php endif ?>>Allo Piano 2.1 DAC Plus</option>
						<option value="allo-piano-dac-pcm512x-audio" <?php if($this->i2smodule === 'allo-piano-dac-pcm512x-audio'): ?> selected <?php endif ?>>Allo Piano DAC</option>
						<option value="applepi-dac" <?php if($this->i2smodule === 'applepi-dac'): ?> selected <?php endif ?>>Apple Pi DAC</option>
						<option value="audioinjector-addons" <?php if($this->i2smodule === 'audioinjector-addons'): ?> selected <?php endif ?>>Audioinjector Addons</option>
						<option value="audioinjector-addons" <?php if($this->i2smodule === 'audioinjector-addons'): ?> selected <?php endif ?>>Audioinjector Octo soundcard</option>
						<option value="audioinjector-wm8731-audio" <?php if($this->i2smodule === 'audioinjector-wm8731-audio'): ?> selected <?php endif ?>>Audioinjector Stereo soundcard</option>
						<option value="audioinjector-wm8731-audio" <?php if($this->i2smodule === 'audioinjector-wm8731-audio'): ?> selected <?php endif ?>>Audioinjector WM8731 Audio</option>
						<option value="audioinjector-wm8731-audio" <?php if($this->i2smodule === 'audioinjector-wm8731-audio'): ?> selected <?php endif ?>>Audioinjector Zero soundcard</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9023</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9023 / AMP</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9028Q2M</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>AUDIOPHONICS I-Sabre DAC ES9038Q2M</option>
						<option value="akkordion-iqdacplus" <?php if($this->i2smodule === 'akkordion-iqdacplus'): ?> selected <?php endif ?>>Digital Dreamtime Akkordion</option>
						<option value="dionaudio-loco" <?php if($this->i2smodule === 'dionaudio-loco'): ?> selected <?php endif ?>>Dionaudio Loco DAC-AMP</option>
						<option value="dionaudio-loco-v2" <?php if($this->i2smodule === 'dionaudio-loco-v2'): ?> selected <?php endif ?>>Dionaudio Loco V2 DAC-AMP</option>
						<option value="fe-pi-audio" <?php if($this->i2smodule === 'fe-pi-audio'): ?> selected <?php endif ?>>Fe-Pi Audio Sound Card</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>Generic ES9023</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>Generic ES90x8</option>
						<option value="hifiberry-dac,384k" <?php if($this->i2smodule === 'hifiberry-dac,384k'): ?> selected <?php endif ?>>Generic PCM510x</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>Generic PCM512x</option>
						<option value="hifiberry-amp" <?php if($this->i2smodule === 'hifiberry-amp'): ?> selected <?php endif ?>>HiFIBerry Amp</option>
						<option value="hifiberry-dac,384k" <?php if($this->i2smodule === 'hifiberry-dac,384k'): ?> selected <?php endif ?>>HiFIBerry DAC</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Lite</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Pro</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Pro XLR</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus RTC</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Standard</option>
						<option value="hifiberry-dac,384k" <?php if($this->i2smodule === 'hifiberry-dac,384k'): ?> selected <?php endif ?>>HiFIBerry DAC Plus Zero</option>
						<option value="hifiberry-digi" <?php if($this->i2smodule === 'hifiberry-digi'): ?> selected <?php endif ?>>HiFIBerry Digi</option>
						<option value="hifiberry-digi" <?php if($this->i2smodule === 'hifiberry-digi'): ?> selected <?php endif ?>>HiFIBerry Digi Plus</option>
						<option value="hifiberry-digi-pro" <?php if($this->i2smodule === 'hifiberry-digi-pro'): ?> selected <?php endif ?>>HiFIBerry Digi Pro</option>
						<option value="iqaudio-dacplus,unmute_amp" <?php if($this->i2smodule === 'iqaudio-dacplus,unmute_amp'): ?> selected <?php endif ?>>IQaudIO Amp</option>
						<option value="iqaudio-dac" <?php if($this->i2smodule === 'iqaudio-dac'): ?> selected <?php endif ?>>IQaudIO DAC</option>
						<option value="iqaudio-dacplus" <?php if($this->i2smodule === 'iqaudio-dacplus'): ?> selected <?php endif ?>>IQaudIO DAC Plus</option>
						<option value="iqaudio-dacplus" <?php if($this->i2smodule === 'iqaudio-dacplus'): ?> selected <?php endif ?>>IQaudIO DAC Pro</option>
						<option value="iqaudio-digi-wm8804-audio" <?php if($this->i2smodule === 'iqaudio-digi-wm8804-audio'): ?> selected <?php endif ?>>IQaudIO Digi wm8804 audio</option>
						<option value="iqaudio-dacplus" <?php if($this->i2smodule === 'iqaudio-dacplus'): ?> selected <?php endif ?>>IQaudIO Pi-DACZero</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom Amp HAT</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom Amp Zero</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom DAC</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom DAC HAT</option>
						<option value="justboom-dac" <?php if($this->i2smodule === 'justboom-dac'): ?> selected <?php endif ?>>JustBoom DAC Zero</option>
						<option value="justboom-digi" <?php if($this->i2smodule === 'justboom-digi'): ?> selected <?php endif ?>>JustBoom Digi</option>
						<option value="hifiberry-dacplus" <?php if($this->i2smodule === 'hifiberry-dacplus'): ?> selected <?php endif ?>>PIFi DAC Plus</option>
						<option value="raspidac3" <?php if($this->i2smodule === 'raspidac3'): ?> selected <?php endif ?>>RaspiDAC3</option>
						<option value="rra-digidac1-wm8741-audio" <?php if($this->i2smodule === 'rra-digidac1-wm8741-audio'): ?> selected <?php endif ?>>Red Rocks Audio DigiDAC1 soundcard</option>
						<option value="rpi-cirrus-wm5102" <?php if($this->i2smodule === 'rpi-cirrus-wm5102'): ?> selected <?php endif ?>>RPi Cirrus WM5102</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>RPi DAC</option>
						<option value="rpi-dac" <?php if($this->i2smodule === 'rpi-dac'): ?> selected <?php endif ?>>Sabre DAC (all models)</option>
                    </select>
					<input class="form-control input-lg" type="text" id="overlay" name="overlay" value="<?php echo $this->i2smodule; ?>" disabled autocomplete="off">
                    <span class="help-block">Enable I&#178;S output selecting one of the available drivers, specific for each hardware. <strong>After rebooting</strong> the output interface will appear in the <a href="/mpd/">MPD configuration select menu</a>, and drivers will also auto-load from the next reboot.<br>
					After selecting your hardware the 'best choice' driver will be used. Because some drivers are used for several different hardware types it is possible that the hardware which is displayed is not the one which you selected</span>
                </div>
            </div>
            <div class="form-group">
                <label for="audio_on_off" class="control-label col-sm-2">HDMI & 3,5mm jack</label>
                <div class="col-sm-10">
                    <label class="switch-light well" onclick="">
                        <input name="audio_on_off" type="checkbox" value="1"<?php if($this->audio_on_off == 1): ?> checked="checked" <?php endif ?>>
                        <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                    </label>
                    <span class="help-block">Set "ON" to enable or "OFF" to disable the onboard ALSA audio interface)</span>
                </div>
            </div>
            <?php endif;?>
            <!-- <div 
            <?php if($this->hwplatformid === '09'): ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="i2smodule">Linux Kernel</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="kernel" data-style="btn-default btn-lg">
                        <option value="linux-ARCH"><?php echo $this->kernel; ?></option>
                    </select>
                    <span class="help-block">There are no other kernels available at the moment!</span>
                </div>
                <label class="control-label col-sm-2" for="i2smodule">I&#178;S kernel modules</label>
                <div class="col-sm-10">
                    <span class="help-block">Enable I&#178;S output by editing /boot/boot.ini. Once set, the output interface will appear in the <a href="/mpd/">MPD configuration select menu</a>, and modules will also auto-load from the next reboot.</span>
                </div>
            </div>
            <?php endif;?>
            </div> -->
            <?php if($this->hwplatformid === '10'): ?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="i2smodule">Linux Kernel</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="kernel" data-style="btn-default btn-lg">
                        <option value="linux-ARCH"><?php echo $this->kernel; ?></option>
                    </select>
                    <span class="help-block">There are no other kernels available at the moment!</span>
                </div>
                <label class="control-label col-sm-2" for="i2smodule">I&#178;S kernel modules</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="i2smodule" data-style="btn-default btn-lg">
                        <option value="none" <?php if($this->i2smodule === 'none'): ?> selected <?php endif ?>>I&#178;S disabled (default)</option>
                        <option value="odroidhifishield" <?php if($this->i2smodule === 'odroidhifishield'): ?> selected <?php endif ?>>ODROID HiFi Shield</option>
                    </select>
                    <span class="help-block">Enable I&#178;S output selecting one of the available sets of modules, specific for each hardware. Once set, the output interface will appear in the <a href="/mpd/">MPD configuration select menu</a>, and modules will also auto-load from the next reboot</span>
                </div>
            </div>
            <?php endif;?>
            <div class="form-group">
                <label class="control-label col-sm-2" for="orionprofile">Sound Signature (optimization profiles)</label>
                <div class="col-sm-10">
                    <select class="selectpicker" name="orionprofile" data-style="btn-default btn-lg">
                        <option value="default" <?php if($this->orionprofile === 'default'): ?> selected <?php endif ?>>ArchLinux default</option>
                        <option value="RuneAudio" <?php if($this->orionprofile === 'RuneAudio'): ?> selected <?php endif ?>>RuneAudio</option>
                        <option value="ACX" <?php if($this->orionprofile === 'ACX'): ?> selected <?php endif ?>>ACX</option>
                        <option value="Orion" <?php if($this->orionprofile === 'Orion'): ?> selected <?php endif ?>>Orion</option>
                        <option value="OrionV2" <?php if($this->orionprofile === 'OrionV2'): ?> selected <?php endif ?>>OrionV2</option>
                        <option value="OrionV3_berrynosmini" <?php if($this->orionprofile === 'OrionV3_berrynosmini'): ?> selected <?php endif ?>>OrionV3 - (BerryNOS-mini)</option>
                        <option value="OrionV3_iqaudio" <?php if($this->orionprofile === 'OrionV3_iqaudio'): ?> selected <?php endif ?>>OrionV3 - (IQaudioPi-DAC)</option>
                        <option value="Um3ggh1U" <?php if($this->orionprofile === 'Um3ggh1U'): ?> selected <?php endif ?>>Um3ggh1U</option>
                    </select>
                    <span class="help-block">These profiles include a set of performance tweaks that act on some system kernel parameters.
                    It does not have anything to do with DSPs or other sound effects: the output is kept untouched (bit perfect).
                    It happens that these parameters introduce an audible impact on the overall sound quality, acting on kernel latency parameters (and probably on the amount of overall 
                    <a href="http://www.thewelltemperedcomputer.com/KB/BitPerfectJitter.htm" title="Bit Perfect Jitter by Vincent Kars" target="_blank">jitter</a>).
                    Sound results may vary depending on where music is listened, so choose according to your personal taste.
                    (If you can't hear any tangible differences... nevermind, just stick to the default settings)</span>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary btn-lg" value="save" name="save" type="submit">Apply settings</button>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="form-horizontal" action="" method="post" role="form" data-parsley-validate>
        <fieldset id="features-management">
            <legend>Features management</legend>
            <p>Enable/disable optional modules that best suit your needs. Disabling unused features will free system resources and might improve the overall performance</p>
            <div <?php if($this->airplay['enable'] === '1'): ?>class="boxed-group"<?php endif ?> id="airplayBox">
                <div class="form-group">
                    <label for="airplay" class="control-label col-sm-2">AirPlay</label>
                    <div class="col-sm-10">
                        <label class="switch-light well" onclick="">
                            <input id="airplay" name="features[airplay][enable]" type="checkbox" value="1"<?php if($this->airplay['enable'] == 1): ?> checked="checked" <?php endif ?>>
                            <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                        </label>
                        <span class="help-block">Toggle the capability of receiving wireless streaming of audio via AirPlay protocol</span>
                    </div>
                </div>
                <div class="<?php if($this->airplay['enable'] != 1): ?>hide<?php endif ?>" id="airplayName">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="airplay-name">AirPlay name</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="text" id="airplay_name" name="features[airplay][name]" value="<?php echo $this->airplay['name']; ?>" data-trigger="change" placeholder="runeaudio">
                            <span class="help-block">AirPlay broadcast name</span>
                        </div>
                    </div>
                </div>
            </div>
            <div <?php if($this->spotify['enable'] === '1'): ?>class="boxed-group"<?php endif ?> id="spotifyBox">
                <div class="form-group">
                    <label for="spotify" class="control-label col-sm-2">Spotify</label>
                    <div class="col-sm-10">
                        <label class="switch-light well" onclick="">
                            <input id="spotify" name="features[spotify][enable]" type="checkbox" value="1"<?php if($this->spotify['enable'] === '1'): ?> checked="checked" <?php endif ?> <?php if($this->activePlayer === 'Spotify'): ?>disabled readonly<?php endif; ?>>
                            <?php if($this->activePlayer === 'Spotify'): ?><input id="spotify" name="features[spotify][enable]" type="hidden" value="1"><?php endif; ?>
                            <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary <?php if($this->activePlayer === 'Spotify'): ?>disabled<?php endif; ?>"></a>
                        </label>
                        <span class="help-block">Due to the Spotify upgrade of May 2018 the Spotify client no longer works<br>
						<i>Enable Spotify client. You must have a <strong><a href="https://www.spotify.com/premium/" target="_blank">Spotify PREMIUM</a></strong> account</i></span>
                    </div>
                </div>
                <div class="<?php if($this->spotify['enable'] != 1): ?>hide<?php endif ?>" id="spotifyAuth">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="spotify-usr">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="text" id="spotify_user" name="features[spotify][user]" value="<?php echo $this->spotify['user']; ?>" data-trigger="change" placeholder="user" autocomplete="off">
                            <span class="help-block">Insert your Spotify <i>username</i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="spotify-pasw">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="password" id="spotify_pass" name="features[spotify][pass]" value="<?php echo $this->spotify['pass']; ?>" placeholder="pass" autocomplete="off">
                            <span class="help-block">Insert your Spotify <i>password</i> (case sensitive)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div <?php if($this->dlna['enable'] === '1'): ?>class="boxed-group"<?php endif ?> id="dlnaBox">
                <div class="form-group">
                    <label for="dlna" class="control-label col-sm-2">UPnP / DLNA</label>
                    <div class="col-sm-10">
                        <label class="switch-light well" onclick="">
                            <input id="dlna" name="features[dlna][enable]" type="checkbox" value="1"<?php if($this->dlna['enable'] == 1): ?> checked="checked" <?php endif ?>>
                            <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                        </label>
                        <span class="help-block">Toggle the capability of receiving wireless streaming of audio via UPnP / DLNA protocol<br>
						This function will not work when Random Play is switched ON</span>
                    </div>
                </div>
                <div class="<?php if($this->dlna['enable'] != 1): ?>hide<?php endif ?>" id="dlnaName">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="dlna-name">UPnP / DLNA name</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="text" id="dlna_name" name="features[dlna][name]" value="<?php echo $this->dlna['name']; ?>" data-trigger="change" placeholder="runeaudio">
                            <span class="help-block">UPnP / DLNA broadcast name</span>
                        </div>
                        <label class="control-label col-sm-2" for="dlna-queueowner">UPnP / DLNA is MPD queue owner</label>
                        <div class="col-sm-10">
							<label class="switch-light well" onclick="">
								<input id="dlna_queueowner" name="features[dlna][queueowner]" type="checkbox" value="1"<?php if($this->dlna['queueowner'] == 1): ?> checked="checked" <?php endif ?>>
								<span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
							</label>
                            <span class="help-block">When ON: a UPnP / DLNA broadcast will clear the MPD queue and then add and play the song, clearing the queue with each successive song<br>
							When OFF: UPnP / DLNA will add songs to the end of the MPD queue and then play them</span>
                        </div>
                    </div>
                </div>
            </div>
			<div class="form-group">
                <label for="pwd-protection" class="control-label col-sm-2">Password protection</label>
                <div class="col-sm-10">
                    <label class="switch-light well" onclick="">
                        <input name="features[pwd_protection]" type="checkbox" value="1"<?php if($this->pwd_protection == 1): ?> checked="checked" <?php endif ?>>
                        <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                    </label>
                    <span class="help-block">Protect the UI with a password (standard is "rune" can be changed on login screen)</span>
                </div>
            </div>
			<?php if($this->local_browseronoff): ?>
			<div class="form-group">
                <label for="local-browser" class="control-label col-sm-2">Local browser</label>
                <div class="col-sm-10">
                    <label class="switch-light well" onclick="">
                        <input name="features[local_browser]" type="checkbox" value="1"<?php if($this->local_browser == 1): ?> checked="checked" <?php endif ?>>
                        <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                    </label>
                    <span class="help-block">Start a local browser on HDMI or TFT</span>
                </div>
			</div>
            <?php else: ?>
			<div class="form-group">
                <label for="local-browser" class="control-label col-sm-2">Local browser</label>
                <div class="col-sm-10">
                    <span class="help-block"><br>Disabled, the required software not installed on this model<br><br></span>
                </div>
			</div>
            <?php endif ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="localSStime">Local ScreenSaver time</label>
                <div class="col-sm-10">
                    <input class="form-control osk-trigger input-lg" type="number" id="localSStime" name="features[localSStime]" value="<?=$this->localSStime ?>" data-trigger="change" min="-1" max="100" placeholder="-1" />
                    <span class="help-block">Sets the time for the local screensaver (0-100, -1 disables the feature)</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="remoteSStime">Remote ScreenSaver time</label>
                <div class="col-sm-10">
                    <input class="form-control osk-trigger input-lg" type="number" id="remoteSStime" name="features[remoteSStime]" value="<?=$this->remoteSStime ?>" data-trigger="change" min="-1" max="100" placeholder="-1" />
                    <span class="help-block">Sets the time for the remote screensaver (0-100, -1 disables the feature)</span>
                </div>
            </div>
            <div class="form-group">
                <label for="udevil" class="control-label col-sm-2">USB Automount</label>
                <div class="col-sm-10">
                    <label class="switch-light well" onclick="">
                        <input name="features[udevil]" type="checkbox" value="1"<?php if($this->udevil == 1): ?> checked="checked" <?php endif ?>>
                        <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                    </label>
                    <span class="help-block">Toggle automount for USB drives</span>
                </div>
            </div>
            <div class="form-group">
                <label for="coverart" class="control-label col-sm-2">Display album cover</label>
                <div class="col-sm-10">
                    <label class="switch-light well" onclick="">
                        <input name="features[coverart]" type="checkbox" value="1"<?php if($this->coverart == 1): ?> checked="checked" <?php endif ?>>
                        <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                    </label>
                    <span class="help-block">Toggle the display of album art on the Playback main screen</span>
                </div>
            </div>
            <div <?php if($this->lastfm['enable'] === '1'): ?>class="boxed-group"<?php endif ?> id="lastfmBox">
                <div class="form-group">
                    <label for="lastfm" class="control-label col-sm-2">Last.fm scrobbling</label>
                    <div class="col-sm-10">
                        <label class="switch-light well" onclick="">
                            <input id="scrobbling-lastfm" name="features[lastfm][enable]" type="checkbox" value="1"<?php if($this->lastfm['enable'] === '1'): ?> checked="checked" <?php endif ?>>
                            <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                        </label>
                        <span class="help-block">Send to Last.fm informations about the music you are listening to (requires a Last.fm account)</span>
                    </div>
                </div>
                <div class="<?php if($this->lastfm['enable'] != 1): ?>hide<?php endif ?>" id="lastfmAuth">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastfm-usr">Username</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="text" id="lastfm_user" name="features[lastfm][user]" value="<?php echo $this->lastfm['user']; ?>" data-trigger="change" placeholder="user" autocomplete="off">
                            <span class="help-block">Insert your Last.fm <i>username</i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="lastfm-pasw">Password</label>
                        <div class="col-sm-10">
                            <input class="form-control osk-trigger input-lg" type="password" id="lastfm_pass" name="features[lastfm][pass]" value="<?php echo $this->lastfm['pass']; ?>" placeholder="pass" autocomplete="off">
                            <span class="help-block">Insert your Last.fm <i>password</i> (case sensitive)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div <?php if($this->samba['enable'] === '1'): ?>class="boxed-group"<?php endif ?> id="sambaBox">
                <div class="form-group">
                    <label for="samba" class="control-label col-sm-2">Samba File-Server</label>
                    <div class="col-sm-10">
                        <label class="switch-light well" onclick="">
                            <input id="samba" name="features[samba][enable]" type="checkbox" value="1"<?php if($this->samba['enable'] === '1'): ?> checked="checked" <?php endif ?>>
                            <span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
                        </label>
                        <span class="help-block">Enable Samba to share your music files on your network</span>
                    </div>
                </div>
                <div class="<?php if($this->samba['enable'] != 1): ?>hide<?php endif ?>" id="sambaAuth">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="samba-readwrite">Read/Write access</label>
                        <div class="col-sm-10">
						
							<label class="switch-light well" onclick="">
								<input id="readwrite" name="features[samba][readwrite]" type="checkbox" value="1"<?php if($this->samba['readwrite'] === '1'): ?> checked="checked" <?php endif ?>>
								<span><span>OFF</span><span>ON</span></span><a class="btn btn-primary"></a>
							</label>
                            <span class="help-block">Choose Read-Only access (<strong>OFF</strong>) or Read/Write access (<strong>ON</strong>).<br>
							By default <strong>no passwords</strong> are required to access the files. Note: Critical system files can be modified by <strong>anyone on your network</strong> after setting read/write access ON.<br>
							Read/Write access allows you to update your music library over the network, it is convenient, but not very fast.<br>
							You can modify the Samba configuration via your PC after setting Samba read/write access ON. Some instructions are included in the files</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary btn-lg" value="1" name="features[submit]" type="submit">apply settings</button>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="form-horizontal" method="post">
        <fieldset>
            <legend>Backup / Restore configuration</legend>
            <p>Transfer settings between multiple RuneAudio installations, saving time during new/upgrade installations.</p>
            <div class="form-group">
                <label class="control-label col-sm-2">Backup player config</label>
                <div class="col-sm-10">
                    <input class="btn btn-primary btn-lg" type="submit" name="syscmd" value="backup" id="syscmd-backup">
					<span class="help-block">Export a compressed archive containing all the settings of this player.</span>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="form-horizontal" method="post">
        <fieldset>
            <div class="form-group">
                <label class="control-label col-sm-2">Activate Restore</label>
                <div class="col-sm-10">
                    <input class="btn btn-primary btn-lg" type="submit" name="syscmd" value="activate" id="syscmd-activate">
					<span class="help-block">For security reasons restore must be activated before use</span>
                </div>
            </div>
        </fieldset>
    </form>
    <form class="form-horizontal" id="restore">
        <fieldset>
			<div <?php if($this->restoreact != 1): ?>hidden<?php endif ?>>
				<div class="form-group">
					<label class="control-label col-sm-2">Restore player config</label>
					<div class="col-sm-10">
						<p>
							<span id="btn-backup-browse" class="btn btn-default btn-lg btn-file">
								Browse... <input type="file" name="filebackup">
							</span> 
							<span id="backup-file"></span>
							<span class="help-block">Restore a previously exported backup.<br>
							<strong>The system will reboot</strong> after restoring the backup</span>
						</p>
						<button id="btn-backup-upload" name="syscmd" value="restore" class="btn btn-primary btn-lg" disabled>Restore</button>
					</div>
				</div>
			</div>
		</fieldset>
    </form>
</div>
<div id="modal-sysinfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal-sysinfo-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title">System status</h3>
            </div>
            <div class="modal-body">
                <strong>RuneAudio version / build</strong>
                <p>Ver. <?=$this->sysstate['release'] ?> build <?=$this->sysstate['buildversion'] ?></p>
				<strong>Active kernel</strong>
				<p><?=$this->sysstate['kernel'] ?></p>
				<strong>System time</strong>
				<p><?=$this->sysstate['time'] ?><br>
				<em>refresh page to update</em></p>
				<strong>System uptime</strong>
				<p><?=$this->sysstate['uptime'] ?><br>
				<em>refresh page to update</em></p>
				<strong>HW platform</strong>
				<p><?=$this->sysstate['HWplatform'] ?></p>
				<strong>HW model</strong>
				<p><?=$this->sysstate['HWmodel'] ?></p>
				<strong>playerID</strong>
				<p><?=$this->sysstate['playerID'] ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
