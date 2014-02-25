<!-- MODULE Block contact infos -->
<div id="block_contact_infos">
  <div class="block_left">
    <p class="faddr">
      {l s='Address' mod='blockcontactinfos'}: {if $blockcontactinfos_address != ''}{$blockcontactinfos_address|escape:'htmlall':'UTF-8'}{/if}<a href="http://alukard.vdovinlab.com/avto/#">{l s='Show on map' mod='blockcontactinfos'}</a>
    </p>
    <p class="ftel">
      {l s='Tel' mod='blockcontactinfos'} {if $blockcontactinfos_phone != ''}{$blockcontactinfos_phone|escape:'htmlall':'UTF-8'}{/if}
    </p>
    <p class="fcon">
      {l s='Contact' mod='blockcontactinfos'}: {if $blockcontactinfos_person != ''}{$blockcontactinfos_person}{/if}{if $blockcontactinfos_email != ''}<a href="mailto:{$blockcontactinfos_email|escape:'htmlall':'UTF-8'}">{$blockcontactinfos_email|escape:'htmlall':'UTF-8'}</a>{/if}
    </p>
  </div>
  <div class="block_right">
    <p>{if $blockcontactinfos_worktime != ''}{$blockcontactinfos_worktime}{/if}</p>
  </div>
</div>
<!-- /MODULE Block contact infos -->
