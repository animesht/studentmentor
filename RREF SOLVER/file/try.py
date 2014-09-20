import sys, json
try:
	data = data = json.loads(sys.argv[1])
except:
	result = "crap"
	print "error"
result = "yolo"
print json.dumps(result)