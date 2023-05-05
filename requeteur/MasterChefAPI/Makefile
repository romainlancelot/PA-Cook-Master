CC	= gcc

SRC =	$(wildcard src/*.c)	\

BIN	= bin/run
BUILD = build

OBJ =$(SRC:.c=.o)
DEP =$(OBJ:.o=.d)  # one dependency file for each source

CFLAGS = -MMD `pkg-config --cflags gtk+-3.0`    # option to generate a .d file during compilation
LDFLAGS = -lm
LIBS = `pkg-config --libs gtk+-3.0`

$(BIN):	$(OBJ)
	$(CC) -o $@	$^ $(LDFLAGS) $(LIBS)
	@echo "Compiling "$@
	@echo "Build successful!"

-include $(DEP)   # include all dep files in the makefile

.PHONY: clean
clean:
	rm -f $(OBJ) $(BIN)

.PHONY: cleandep
cleandep:
	rm -f $(DEP)
