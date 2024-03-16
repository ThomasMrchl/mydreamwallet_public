function typingEffect() {
    const typingIds = ["title"];
    for (let i = 0; i < typingIds.length; i++) {
      const element = document.getElementById(typingIds[i]);
      const text = element.textContent;
      let j = 0;
      element.textContent = "";
      const typeWriter = setInterval(() => {
        element.textContent += text.charAt(j);
        j++;
        if (j > text.length - 1) {
          clearInterval(typeWriter);
        }
      }, 100);
    }
  }
  
  typingEffect();