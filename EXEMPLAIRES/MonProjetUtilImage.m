 
#----------------------------------------------------------------------------function principale----------------------------------------------------------------------------------------------
 function fonction_unit
  global fen
  fen= figure('name','Teste','menubar','none','numbertitle','off','position',[250 60 1000 600])

  m1 = uimenu(fen, 'label','&Fichier',    'accelerator','f');                               
  uimenu(m1, 'label','Quitter',           'accelerator','q');         

  m2 = uimenu(fen, 'label','&Matrice', 'accelerator','m','callback',@matrice_principale);                              
  
  m3 = uimenu(fen, 'label','&Signaux', 'accelerator','s');                              
  
##uicontrol(fen,'style','togglebutton', 'string','texte', 'position',[50 50 100 30], 'value',0|1);
endfunction

fen;
function matrice_principale
  global fen
  clf(fen);

  m1 = uimenu(fen, 'label','&Fichier',    'accelerator','f');                               
  uimenu(m1, 'label','Quitter',           'accelerator','q');         

  m2 = uimenu(fen, 'label','&Matrice', 'accelerator','c','callback',@matrice_principale);                               
  
  m3 = uimenu(fen, 'label','&Signaux', 'accelerator','g');       
  uicontrol(fen, 'style','popupmenu','string',{'Operation sur un matrice','Operation sur deux matrice'},'position',[20 540 240 40],'backgroundcolor',[.60 .90 .80],'callback',@teste);
endfunction

#--------------------------------------------------------------------------------Menu pop------------------------------------------------------------------------------------------------
function teste(h)
  menu  = get(h,'string');         
  fct = menu{get(h,'value')};      
  switch fct
    case 'Operation sur un matrice'
      matrice1;
    case 'Operation sur deux matrice'
      matrice2;
  end 
end

#--------------------------------------------------------------------------------Paneau matrice1------------------------------------------------------------------------------------------------
matrice = 0;
panelMat11;
panelMat11an;
function matrice1 
  global matrice
  global fen
  global champ1
  global champ2
  global panelMat11;
  global panelMat11an
  
  clf(fen)
  matrice_principale
  champ1 = uicontrol(fen, 'style','edit', 'string','0', 'position',[210 490 50 30]);
  lab1 = uicontrol(fen, 'style','text', 'string','Entrer le nombre de ligne :', 'position',[20 490 190 30],'backgroundcolor',[.80 .90 .85]);
  champ2 = uicontrol(fen, 'style','edit', 'string','0', 'position',[210 440 50 30]);
  lab2 = uicontrol(fen, 'style','text', 'string','Entrer le nombre de colone :', 'position',[20 440 190 30],'backgroundcolor',[.80 .90 .85]);
  panelMat11 = uipanel(fen, 'position',[.02 .1 .24 .45],'fontsize',10,'backgroundcolor',[.25 .30 .45]);  
  
  panelMat11an = uipanel(panelMat11, 'position',[.02 .02 .96 .86],'fontsize',10,'backgroundcolor',[.60 .80 .95]);  
  uicontrol(panelMat11,'style','text','string','Saisie de la matrice ','fontsize',14,'foregroundcolor',[.80 .90 .85],'backgroundcolor',[.25 .30 .45],'position',[0 235 248 30]);

  
  uicontrol(fen,'style','text','string',' ','backgroundcolor',[.25 .30 .45],'position',[300  576 664 5]);
 
  uicontrol(fen,'style','pushbutton','string','Addition ','backgroundcolor',[.25 .30 .45],'position',[350  505 180 30]);
  uicontrol(fen,'style','pushbutton','string',' Multiplication','backgroundcolor',[.25 .30 .45],'position',[540 505 180 30]);
  uicontrol(fen,'style','pushbutton','string','Transpose ','backgroundcolor',[.25 .30 .45],'position',[730 505 180 30],'callback',@transposeMat);
  uicontrol(fen,'style','pushbutton','string',' Inverse','backgroundcolor',[.25 .30 .45],'position',[350 465 180 30],'callback',@inverseMat);
  uicontrol(fen,'style','pushbutton','string','Rang ','backgroundcolor',[.25 .30 .45],'position',[540 465 180 30],'callback',@rangMat);
  uicontrol(fen,'style','pushbutton','string',' Valeur propre','backgroundcolor',[.25 .30 .45],'position',[730 465 180 30],'callback',@valPropre);
  uicontrol(fen,'style','pushbutton','string','Vecteur propre ','backgroundcolor',[.25 .30 .45],'position',[350 425 180 30],'callback',@vecteurPropre);
  uicontrol(fen,'style','pushbutton','string',' Diagonalisaton','backgroundcolor',[.25 .30 .45],'position',[540 425 180 30],'callback',@diagonalisationMat);
  uicontrol(fen,'style','pushbutton','string',' Decomposition','backgroundcolor',[.25 .30 .45],'position',[730 425 180 30]);
  
  uicontrol(fen,'style','text','string',' ','backgroundcolor',[.25 .30 .45],'position',[300  380 664 5]);

  
  uicontrol(fen, 'style','pushbutton','string','Executer-Afficher','position',[20 380 240 40],'backgroundcolor',[.60 .90 .40],'callback',{@affice_champs,champ1,champ2,fen}); 
end

#----------------------------------------------------------------------------------affichage des champs de saisie de la matrice 1------------------------------------------------------------
panelMat11;
panelMat11affichage;
panelresultatcalcul;
panelMat11an;
tri;
function affice_champs(hsrc,event,champ1,champ2,fen) 
  global panelMat11;
  global panelMat11affichage;
  global panelresultatcalcul;
  global panelMat11an;
  nbl = get(champ1,'string');
  nbc = get(champ2,'string'); 
  nl = str2num(nbl)
  nc = str2num(nbc)  
  matrice = 0;  
  matrice = champsMat1(matrice,panelMat11an,nl,nc,35,35);
  uicontrol(fen, 'style','pushbutton','string','Executer','position',[20 20 240 30],'backgroundcolor',[.60 .90 .40],'callback',{@affiche_matrice,matrice});
  panelMat11affichage = uipanel(fen,'title','Matrice 1','fontsize',14, 'position',[.3 .1 .24 .45],'fontsize',10);  
  panelresultatcalcul = uipanel(fen,'fontsize',14, 'position',[.6 .1 .37 .45],'fontsize',10,'backgroundcolor',[.25 .30 .45]);  
  tri = uicontrol(panelresultatcalcul,'style','text','string','Voici la matrice ','fontsize',18,'backgroundcolor',[.60 .80 .95],'position',[5 5 358 227]);
  uicontrol(panelresultatcalcul,'style','text','string','Resultats de  tous les calcules ','fontsize',14,'foregroundcolor',[.80 .90 .85],'backgroundcolor',[.25 .30 .45],'position',[0 235 350 30]);
endfunction


function m = champsMat1(m,panelMat11,nbr_ligne,nbr_colone,x,y)
  for i = 1:nbr_ligne
    for j = 1:nbr_colone
      m(i,j) = uicontrol(panelMat11,'style','edit','fontsize',12,'foregroundcolor','w','backgroundcolor',[.25 .30 .45],'position',[x+i*35,y+j*35,30,30]);
    endfor
  endfor
  m = flip(m,2);
  m = transpose(m);
endfunction

#----------------------------------------------------------------------------------affichage de la matrice 1------------------------------------------------------------
panelMat11affichage;
function affiche_matrice(hsrc,event,matrice)
  global panelMat11affichage;
  global tri;
  matrice_val = valeur_matrice(matrice);
  disp(matrice_val);  
  valeurs = num2str(matrice_val);
  uicontrol(panelMat11affichage,'style','text','string','Voici la matrice ','fontsize',14,'foregroundcolor','b','position',[40 200 160 30]);
  uicontrol(panelMat11affichage,'style','text','string',valeurs,'fontsize',16,'backgroundcolor',[.25 .30 .45],'position',[40 40 150 150]); 
 endfunction
 
 
function m = valeur_matrice(matrice)
 m=0;val = 0;
 for i=1:size(matrice)(1)
   for j=1:size(matrice)(2)
     val = get(matrice(i,j),'string');
     m(i,j) = str2num(val);
   endfor
 endfor
 
endfunction




#--------------------------------------------------------------------------------Valeur propre------------------------------------------------------------------------------------------------

matrix = 0;
panelresultatcalcul;
function valPropre(hsrc,event)
  global matrix;
  global panelresultatcalcul;
  v = eig(matrix)
  valeur = num2str(v);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction

#--------------------------------------------------------------------------------vecteur propre------------------------------------------------------------------------------------------------
function vecteurPropre(hsrc,event)
  global matrix;
  global panelresultatcalcul;
  global tri;
  e = eig(matrix)
  valeur = num2str(e);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction

###--------------------------------------------------------------------------------Inverse de la  matrice------------------------------------------------------------------------------------------------
function inverseMat(hsrc,event)
  m = 0;
  global matrix;
  global panelresultatcalcul;
  global tri;
  m = inverse(matrix)
  valeur = num2str(m);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction

###--------------------------------------------------------------------------------Transpose de la matrice------------------------------------------------------------------------------------------------
function transposeMat(hsrc,event)
  m = 0;
  global matrix;
  global panelresultatcalcul;
  global tri;
  m = transpose(matrix)
  valeur = num2str(m);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction

###--------------------------------------------------------------------------------Trace de la matrice------------------------------------------------------------------------------------------------
function traceMat(hsrc,event)
  tra = 0;
  global matrix;
  global panelresultatcalcul;
  global tri;
  tra = trace(matrix)
  valeur = num2str(tra);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction


###--------------------------------------------------------------------------------Diagonalisaton de la matrice------------------------------------------------------------------------------------------------
function diagonalisationMat(hsrc,event)
  dia = 0;
  global matrix;
  global panelresultatcalcul;
  global tri;
  dia = diag(matrix)
  valeur = num2str(dia);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction


###--------------------------------------------------------------------------------Rang de la matrice------------------------------------------------------------------------------------------------
function rangMat(hsrc,event)
  ran = 0;
  global matrix;
  global panelresultatcalcul;
  global tri;
  ran = rank(matrix)
  valeur = num2str(ran);
  uicontrol(panelresultatcalcul,'style','text','string',valeur,'fontsize',17,'backgroundcolor',[.60 .80 .95],'position',[20 20 290 160]); 
endfunction
#--------------------------------------------------------------------------------Fin de la matrice 1------------------------------------------------------------------------------------------------





#--------------------------------------------------------------------------------Paneau matrice2------------------------------------------------------------------------------------------------
function matrice2
  
  global fen
  global panelMat21
  global panelMat22
  clf(fen)
  matrice_principale
  
  
  panelMat21 = uipanel(fen,'title','MATRICE 1', 'position',[.3 .62 .26 .35],'fontsize',12);
  uicontrol(fen, 'style','pushbutton','string','Executer','position',[640 330 260 30],'backgroundcolor',[.60 .90 .40]);
  panelMat22 = uipanel(fen,'title','MATRICE 2', 'position',[.64 .62 .26 .35],'fontsize',12);
  uicontrol(fen, 'style','pushbutton','string','Executer','position',[300 330 260 30],'backgroundcolor',[.60 .90 .40]);
  
  champ1 = uicontrol(fen, 'style','edit', 'string','0', 'position',[210 500 50 30]);
  lab1 = uicontrol(fen, 'style','text', 'string','Nombre de ligne de la mat1 :', 'position',[20 500 190 30],'backgroundcolor',[.80 .90 .85]);
  champ2 = uicontrol(fen, 'style','edit', 'string','0', 'position',[210 460 50 30]);
  lab2 = uicontrol(fen, 'style','text', 'string',' Nombre de colone de la mat1 :', 'position',[20 460 190 30],'backgroundcolor',[.80 .90 .85]);
  
  champ3 = uicontrol(fen, 'style','edit', 'string','0', 'position',[210 420 50 30]);
  lab3 = uicontrol(fen, 'style','text', 'string','Nombre de ligne de la mat2 :', 'position',[20 420 190 30],'backgroundcolor',[.90 .90 .80]);
  champ4 = uicontrol(fen, 'style','edit', 'string','0', 'position',[210 380 50 30]);
  lab4 = uicontrol(fen, 'style','text', 'string',' Nombre de colone de la mat2 :', 'position',[20 380 190 30],'backgroundcolor',[.90 .90 .80]);
  
  uicontrol(fen, 'style','pushbutton','string','Executer-Afficher','position',[20 330 240 40],'backgroundcolor',[.60 .90 .40],'callback',{@teste4,champ1,champ2,champ3,champ4});
end



#--------------------------------------------------------------------------------Matrice2 a deux champs------------------------------------------------------------------------------------------------
matrice10 = 0;
matrice20 = 0;
function teste4(hsrc,event,champ11,champ21,champ12,champ22) 
  nbl1 = get(champ11,'string');
  nbc1 = get(champ21,'string');
  nl1 = str2num(nbl1)
  nc1 = str2num(nbc1)
  global matrice10;
  global panelMat21;
  
  nbl2 = get(champ12,'string');
  nbc2 = get(champ22,'string');
  nl2 = str2num(nbl2)
  nc2 = str2num(nbc2)
  global matrice20;
  global panelMat22;
  
  for i = 1:nl1
    for j = 1:nc1
      matrice10(i,j) = uicontrol(panelMat21,'style','edit','position',[i*40,j*40,25,25]);
    endfor
  endfor
  
  for k = 1:nl2
    for l = 1:nc2
      matrice20(k,l) = uicontrol(panelMat22,'style','edit','position',[k*40,l*40,25,25]);
    endfor
  endfor
endfunction

#--------------------------------------------------------------------------------Recuperation de la matrice1------------------------------------------------------------------------------------------------












