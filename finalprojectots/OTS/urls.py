from django.urls import path
from .views import *
urlpatterns = [
    path('new-question/',newQuestion),
    path('save-question/',saveQuestion),
    path('view-question/',viewQuestion),
    path('edit-question/',editQuestion),
    path('edit-save-question/',editsavequestion),
    path('delete-question/',deletequestion),
    path('signup/',signup),
    path('save-user/',saveUser),
    path('login/',login),
    path('login-validation/',loginValidation),
    path('home/',home),
    path('logout/',logout),
    path('start-test/',starttest),
    path('test-result/',testResult),
    
    
]