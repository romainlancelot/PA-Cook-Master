CC	= gcc

SRC =	$(wildcard src/*.c)	\

BIN	= bin/run
LIB_MY	=	lib/my
INCLUDE	=	include/

OBJ =$(SRC:.c=.o)
DEP =$(OBJ:.o=.d)  # one dependency file for each source

CFLAGS = -MMD `pkg-config --cflags gtk+-3.0`    # -MMD option to generate a .d file during compilation
LIBS = `pkg-config --libs gtk+-3.0` -l my
CPPFLAGS	+=	-I./$(INCLUDE)
LDFLAGS	=	-L ./lib -l my -lm

$(BIN):	$(OBJ)
	make -C ./lib/my
	$(CC) -o $@	$^ $(LDFLAGS) $(LIBS) $(LDFLAGS)
	@echo "Compiling "$@
	@echo "Build successful!"

-include $(DEP)   # include all dep files in the makefile

.PHONY: clean
clean:
	make clean -C ./lib/my
	rm -f $(OBJ) $(BIN)

.PHONY: cleandep
cleandep:
	make fclean -C lib/my
	rm -f $(DEP)

.PHONY: fclean
fclean: cleandep clean
