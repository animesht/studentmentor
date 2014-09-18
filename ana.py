"""

Sanskriti data : 9170850 - 9171098 

"""

import numpy as np

import urllib2

from mechanize import Browser

br = Browser()

intitial_roll = "9170850"				#initial roll number

record = {
	"ENGLISH CORE" : [],
	"MATHEMATICS" : [],
	"PHYSICS" : [],
	"CHEMISTRY" : [],
	"COMPUTER SCIENCE" : [],
	"PHYSICAL EDUCATION" : [],
	"BIOLOGY" : [],
	"APP/COMMERCIAL ART" : [],
	"BIOTECHNOLOGY" : [],
	"ECONOMICS" : [],
	"BUSINESS STUDIES" : [],
	"ACCOUNTANCY" : [],
	"PSYCHOLOGY" : [],
	"POLITICAL SCIENCE" : [],
	"GEOGRAPHY" : [],
	"HISTORY" : [],
	"ENTREPRENEURSHIP" : [],
	"HOME SCIENCE" : [],
	"SOCIOLOGY" : [],
	"FASHION STUDIES" : [],
	"HINDI CORE" : [],
	"ENGG. GRAPHICS" : [],
	"INFORMATICS PRAC." : [],
	"HINDI ELECTIVE" : [],
	"MULTIMEDIA & WEB T" : [],
	"GRAPHICS" : [],
	"PAINTING" : [],
	"MUSIC HIND.VOCAL" : [],
	"FUNCTIONAL ENGLISH" : [],
	"PUNJABI" : [],
	"EVOL& FORMS M M II" : []

};

for i in range(10000):

	br.open("http://cbseresults.nic.in/class12/cbse122014_total.htm")
	br.select_form(name="FrontPage_Form1")
	br["regno"] = intitial_roll
	response = br.submit()

	marks_line_num=[107,116,125,134,143]
	subject_line_num=[104,113,122,131,140]


	"""

	WHAT I DID
	----------

	Sample HTML source code:

	<tr bgColor="#ffffff">
    	<td align="middle"><font face="Arial" size=2> 301</font></td>
    	<td align="left" ><font face="Arial" size=2>ENGLISH CORE</font></td>
    	<td align="left" ><font face="Arial" size=2>095</font></td>
    	<td align="left" ><font face="Arial" size=2>---</font></td>
    	<td align="left" ><font face="Arial" size=2>095&nbsp;&nbsp;&nbsp;&nbsp;</font></td>
    	<td align="middle"><font face="Arial" size=2>A1</font></td>
  	</tr>

  	1. Note line number in which subject is given. --> add to subject_line_num array
  	2. Note line number in which marks is given. --> add to marks_line_num array

	"""
	"""

	1. p is the line in which subject name is given (checked by enumerate and subject_line_num)

	Sample HTML:

		<td align="left" ><font face="Arial" size=2>ENGLISH CORE</font></td>

	2. Split delimitter > first. gives us : 
		['<td align="left"','<font face="Arial" size=2','ENGLISH CORE</font','</td', '\r']

	3. Take index 2 and split it again wiht delimitter < . gives us :
		['ENGLISH CORE', '/font']

	4.Take 1st element


	"""



	for l,p in enumerate(response.read().split('\n')):	#extract only marks table from source file
		
		if l in subject_line_num:
			sub = (p.split(">")[2]).split("<")[0]

		if l in marks_line_num:		
			if sub == "MATHEMATICS":					
				k = p.split()[-1][7:10]		#get the marks from html source
				if "&nb" in k or ";&n" in k:
					record[sub].append(int(0))
				else:
					record[sub].append(int(k))
	
	#print "roll number : ",intitial_roll," appended"
	print intitial_roll
	intitial_roll = int(intitial_roll)
	intitial_roll+=1
	intitial_roll=str(intitial_roll)


tally = {
	"ENGLISH CORE" : [0 for i in range(101)],
	"MATHEMATICS" : [0 for i in range(101)],
	"PHYSICS" : [0 for i in range(101)],
	"CHEMISTRY" : [0 for i in range(101)],
	"COMPUTER SCIENCE" : [0 for i in range(101)],
	"PHYSICAL EDUCATION" : [0 for i in range(101)],
	"BIOLOGY" : [0 for i in range(101)],
	"APP/COMMERCIAL ART" : [0 for i in range(101)],
	"BIOTECHNOLOGY" : [0 for i in range(101)],
	"ECONOMICS" : [0 for i in range(101)],
	"BUSINESS STUDIES" : [0 for i in range(101)],
	"ACCOUNTANCY" : [0 for i in range(101)],
	"PSYCHOLOGY" : [0 for i in range(101)],
	"POLITICAL SCIENCE" : [0 for i in range(101)],
	"GEOGRAPHY" : [0 for i in range(101)],
	"HISTORY" : [0 for i in range(101)],
	"ENTREPRENEURSHIP" : [0 for i in range(101)],
	"HOME SCIENCE" : [0 for i in range(101)],
	"SOCIOLOGY" : [0 for i in range(101)],
	"FASHION STUDIES" : [0 for i in range(101)],
	"HINDI CORE" : [0 for i in range(101)],
	"ENGG. GRAPHICS" : [0 for i in range(101)],
	"INFORMATICS PRAC." : [0 for i in range(101)],
	"HINDI ELECTIVE" : [0 for i in range(101)],
	"MULTIMEDIA & WEB T" : [0 for i in range(101)],
	"GRAPHICS" : [0 for i in range(101)],
	"PAINTING" : [0 for i in range(101)],
	"MUSIC HIND.VOCAL" : [0 for i in range(101)],
	"FUNCTIONAL ENGLISH" : [0 for i in range(101)],
	"PUNJABI" : [0 for i in range(101)],
	"EVOL& FORMS M M II" : [0 for i in range(101)]
}
for i in tally:
	for j in range(1,101):
		tally[i][j] = record[i].count(j)

print record["MATHEMATICS"]

from pylab import *

from matplotlib import pyplot

fig = pyplot.figure()

width = 0.4
OY=tally["MATHEMATICS"]
OX=[i for i in range(101)]


X = np.arange(len(OY))

pyplot.bar(X,OY)
pyplot.xticks(X +width/2, OX)

fig.autofmt_xdate()


show()







