from django import template
import datetime
register=template.Library()
@register.simple_tag(name="get_date")#decoder
def get_date():
    x=datetime.datetime.now()
    return x
#get_date ko template tag kese mana jaye
#ush ke liye register karana hoga
#template_libary ko
@register.filter
def quote(value):
    x='"'+str(value)+'"'
    return x