# -*- coding: utf-8 -*-
"""
Created on Sun Nov  3 05:57:57 2019

@author: ISAACGONZALEZGUTIERR
"""


import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
import seaborn as sns
from sklearn.model_selection import train_test_split
from sklearn.svm import SVC
from sklearn.model_selection import GridSearchCV
from sklearn.preprocessing import StandardScaler
from sklearn.metrics import  confusion_matrix, classification_report
from sklearn.utils import shuffle
from helper_plot import plotValidationCurves



#Importamos los datos
mainpath = 'C:/Users/ISAACGONZALEZGUTIERR/Documents/Personal/Proyecto Modular/datasets/'
df = pd.read_csv(mainpath + 'subset_atus_anual_2011-17_binario_balanceado_2class_AllFeatures_Mes.csv')
df_val = pd.read_csv(mainpath + 'subset_atus_anual_2011-17_binario_2class_validacion_Mes.csv')



#Elegimos la variable a predecir
target = 'CLASACC'


#Columnas a eliminar
names = ['CLASACC', 'TRANVIA', 'FERROCARRI',
         'TIPACCID_Colision con vehiculo automotor2',
         'URBANA_Sin accidente en esta zona',
         'SUBURBANA_Sin accidente en esta zona',
         'MICROBUS',
         'OMNIBUS',
         'TIPACCID_Caida de pasajero',
         'TIPACCID_Colision con animal',
         'TIPACCID_Incendio',
         'CAUSAACCI_Falla del vehiculo',
         'CAUSAACCI_Otra',
         'CAPAROD_No Pavimentada',
         'SEXO_Mujer',
         'ALIENTO_No',
         'CINTURON_No',
         'TIPACCID_Colision con ferrocarril']




#Asignamos la variables predictoras y el target a arreglos de numpy
X = np.array(df.drop(columns = names))
y = np.array(df[target], dtype = np.int8)

#Asignar Variables con Shuffle
#X, y = shuffle(X,y, random_state = 0)

X_val = np.array(df_val.drop(columns = names))
y_val = np.array(df_val[target], dtype = np.int8)


#Escalamos los datos para un mejor procesamiento con StandardScaler
sc_X = StandardScaler()
sc_X.fit(X)
X = sc_X.transform(X)


#print(x[2,:].tolist())
#print(list(zip(features,x[2,:].tolist())))


#Separamos el dataset en entrenamietno y prueba

X_train, X_test, y_train, y_test = train_test_split(X,y, test_size=0.30, 
                                                    random_state=42)

X_train_val, X_test_val, y_train_val, y_test_val = train_test_split(X_val,
                                                                    y_val,
                                                                    test_size=0.10, 
                                                                    random_state=42)




########################### MODELO SVC CON PARAMETROS AJUSTADOS ##########################
svc = SVC()



########################### MODELO SVC CON PARAMETROS AJUSTADOS ##########################
"""
svc = SVC(kernel='rbf',
          class_weight = 'balanced',
          #C=12,
          gamma=0.01)


"""

################### Búsqueda de los mejores hiperparámetros ##################
"""
param_grid = {
            'C': [5, 8, 10, 11, 12, 15],
            #'gamma': [0.0001, 0.0005, 0.001, 0.005, 0.01, 0.1]
        }

model = GridSearchCV(svc, param_grid)
model.fit(X_train, y_train)
print('\nBest param: ', model.best_params_)

"""
############### Curvas de Validación ##################################
param_range = [5, 8, 10, 11, 12, 15]
#param_range = [0.0001, 0.0005, 0.001, 0.005, 0.01, 0.1]


plotValidationCurves(model = svc, X = X_train,
                     y = y_train,
                     param_name = 'C',
                     param_range = param_range)

###########################################################################


model = svc
model.fit(X_train, y_train)

score_Train = model.score(X_train, y_train)
score_Test = model.score(X_test, y_test)
ytest_pred = model.predict(X_test)

print('\n------------------------------------------------------------')
print('\nScore train SVC: {0: .5f}'.format(score_Train))
print('Score test SVC: {0: .5f}'.format(score_Test))

print('\n------------------------------------------------------------')
print('Clasification report')
print(classification_report(y_test,ytest_pred))

print('\n------------------------------------------------------------')
print('Matriz de confusión: \n')


cm = confusion_matrix(y_test, ytest_pred)
target_names = ['No_fatal', 'Fatal']
print(cm)

plt.figure()
sns.heatmap(cm, annot = True, square = True, xticklabels = target_names,
            yticklabels = target_names, robust = False, cbar_kws = {'shrink': 0.5},
            fmt="d")




