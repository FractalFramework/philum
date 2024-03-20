<?php 
return [1=>['hotspot','>cnfg
netsh wlan set hostednetwork mode=allow ssid=\"davnet\" key=\"dqvn3t01\"

>start
netsh wlan start davnet

>close
netsh wlan stop davnet

>nfo
netsh wlan show hostednetworkname']]; ?>