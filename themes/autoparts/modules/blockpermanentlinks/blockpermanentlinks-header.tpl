<!-- Block permanent links module HEADER -->
<ul id="header_links">
  <li id="header_link_main"><a href="/" title="{l s='home' mod='blockpermanentlinks'}">{l s='home' mod='blockpermanentlinks'}</a></li>
  <li id="header_link_catalog"><a href="/"{*{$link->getPageLink('contact', true)|escape:'html'}*} title="{l s='catalog' mod='blockpermanentlinks'}">{l s='catalog' mod='blockpermanentlinks'}</a></li>
  <li id="header_link_news"><a href="/" title="{l s='news' mod='blockpermanentlinks'}">{l s='news' mod='blockpermanentlinks'}</a></li>
  <li id="header_link_contact"><a href="{$link->getCMSLink(6)|escape:'html'}" title="{l s='contact' mod='blockpermanentlinks'}">{l s='contact' mod='blockpermanentlinks'}</a></li>
  <li id="header_link_feedback"><a href="{$link->getPageLink('contact')}" title="{l s='feedback' mod='blockpermanentlinks'}">{l s='feedback' mod='blockpermanentlinks'}</a></li>
</ul>
<!-- /Block permanent links module HEADER -->
