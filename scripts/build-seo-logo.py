"""Render the site's existing SVG wordmark into SEO-friendly PNG assets."""

from pathlib import Path
import re
import xml.etree.ElementTree as ET

from PIL import Image, ImageDraw


ROOT = Path(__file__).resolve().parents[1]
SOURCE = ROOT / "assets/images/aiv-web-logo.svg"
OUTPUT = ROOT / "assets/images/seo"
OUTPUT.mkdir(parents=True, exist_ok=True)


def paths():
    tree = ET.parse(SOURCE)
    ns = {"svg": "http://www.w3.org/2000/svg"}
    for node in tree.findall(".//svg:path", ns):
        data = node.attrib["d"]
        if set(re.findall(r"[A-Za-z]", data)) - {"M", "L", "Z"}:
            raise ValueError("Unexpected SVG path command")
        points = [float(value) for value in re.findall(r"-?\d+(?:\.\d+)?", data)]
        yield list(zip(points[::2], points[1::2]))


def wordmark(width, color="white"):
    scale = width / 1031
    height = round(150 * scale)
    image = Image.new("RGBA", (width, height), (0, 0, 0, 0))
    draw = ImageDraw.Draw(image)
    for points in paths():
        draw.polygon([(round(x * scale), round(y * scale)) for x, y in points], fill=color)
    return image


mark = wordmark(1031)
mark.save(OUTPUT / "aiv-web-wordmark-reference.png", optimize=True)

square = Image.new("RGB", (512, 512), "#050505")
small_mark = wordmark(460)
square.paste(small_mark, (26, 256 - small_mark.height // 2), small_mark)
square.save(OUTPUT / "aiv-web-logo-square-512.png", optimize=True)
