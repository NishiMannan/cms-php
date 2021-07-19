menu = """Please select one of the follownin:
1)Adding enteries
2)Viewing Enteries
3)Exit

Your Selection:"""

welcome = "Welcome to the programming diary!"

print(welcome)

userinput = input(menu)

while userinput != "3":
      if userinput == "1":
         print("adding")
      elif userinput == "2":
         print("view")
      else:
         print("Wrong Choice Please try again")

      userinput = input(menu)
